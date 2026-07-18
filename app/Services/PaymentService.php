<?php

namespace App\Services;

use App\Models\Booking;

class PaymentService
{
    public function pay(
        Booking $booking
    ) {
        $booking->update([
            'payment_date' => now(),
            'status' => 'paid',
        ]);
    }

    public function complete(
        Booking $booking
    ) {
        $booking->update([
            'status' => 'completed',
        ]);

        app(
            LoyaltyRewardOptimizerService::class
        )->process($booking);
    }

    public function cancel(
        Booking $booking
    ) {
        $booking->update([
            'status' => 'cancelled',
        ]);
    }
}