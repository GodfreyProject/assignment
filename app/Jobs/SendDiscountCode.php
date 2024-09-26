<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendDiscountCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $userId;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param DiscountService $discountService
     */
    public function handle(DiscountService $discountService)
    {
        $code = $discountService->createDiscountCode($this->userId);
        // Here you would typically send an email with the discount code
        // For this example, we'll just log it
        \Log::info("Discount code {$code} created for user {$this->userId}");
    }
   
}
