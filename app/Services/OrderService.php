<?php

namespace App\Services;

use App\Models\Order;
use App\Services\CartService;
use App\Services\DiscountService;

/**
 * OrderService
 * 
 * Handles business logic related to orders.
 */

class OrderService
{
    protected $cartService;
    protected $discountService;

    /**
     * Constructor
     * 
     * @param CartService $cartService
     * @param DiscountService $discountService
     */

    public function __construct(CartService $cartService, DiscountService $discountService)
    {
        $this->cartService = $cartService;
        $this->discountService = $discountService;
    }

    /**
     * Create a new order for the user.
     *
     * @param int $userId
     * @param string|null $discountCode
     * @return Order
     */

    public function createOrder($userId, $discountCode = null)
    {
        $cartItems = $this->cartService->getCartItems($userId);
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $discountAmount = 0;
        if ($discountCode) {
            $discountAmount = $this->discountService->applyDiscount($discountCode, $userId);
            $totalAmount -= $discountAmount;
        }

        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'discount_code' => $discountCode,
            'discount_amount' => $discountAmount,
        ]);

        $this->cartService->clearCart($userId);

        return $order;
    }
}