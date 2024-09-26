<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;

/**
 * CartService
 * 
 * Handles business logic related to the shopping cart.
 */

class CartService
{
    /**
     * Add a product to the user's cart.
     *
     * @param int $userId
     * @param int $productId
     * @throws \Exception
     */
    public function addToCart($userId, $productId)
    {
        $product = Product::findOrFail($productId);
        
        if (!$product->isInStock()) {
            throw new \Exception('Product is out of stock');
        }

        $cartItem = Cart::firstOrNew([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);

        $cartItem->quantity += 1;
        $cartItem->save();

        // Decrease product stock
        $product->decrement('stock');
    }

    /**
     * Get all cart items for a user.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getCartItems($userId)
    {
        return Cart::where('user_id', $userId)->with('product')->get();
    }

    /**
     * Clear the user's cart.
     *
     * @param int $userId
     */

    public function clearCart($userId)
    {
        Cart::where('user_id', $userId)->delete();
    }
}