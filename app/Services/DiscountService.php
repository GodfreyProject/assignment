<?php

namespace App\Services;

use App\Models\Discount;
use App\Jobs\SendDiscountCode;

/**
 * DiscountService
 * 
 * Handles business logic related to discounts.
 */

class DiscountService

{
     /**
     * Apply a discount code to an order.
     *
     * @param string $code
     * @param int $userId
     * @return float
     */
    public function applyDiscount($code, $userId)
    {
        $discount = Discount::where('code', $code)
            ->where('user_id', $userId)
            ->where('used', false)
            ->first();

        if (!$discount) {
            return 0;
        }

        $discount->used = true;
        $discount->save();

        return $discount->amount;
    }

    /**
     * Schedule the creation of a discount code.
     *
     * @param int $userId
     */

    public function scheduleDiscountCode($userId)
    {
        SendDiscountCode::dispatch($userId)->delay(now()->addMinutes(15));
    }

    /**
     * Create a new discount code for a user.
     *
     * @param int $userId
     * @return string
     */

    public function createDiscountCode($userId)
    {
        $code = $this->generateUniqueCode();
        
        Discount::create([
            'code' => $code,
            'amount' => 5.00,
            'user_id' => $userId,
            'used' => false,
        ]);

        return $code;
    }

    /**
     * Generate a unique discount code.
     *
     * @return string
     */

    private function generateUniqueCode()
    {
        // Implementation of unique code generation
        return 'DISCOUNT' . rand(1000, 9999);
    }
}