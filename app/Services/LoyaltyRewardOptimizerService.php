<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\LoyaltyHistory;
use App\Models\Notification;

class LoyaltyRewardOptimizerService
{
    public function process(Booking $booking)
    {
        $user = $booking->user;

        $distance =
            $booking->schedule
                ->package
                ->distance_km;

        $previousTier = $user->loyalty_tier;

        $user->total_distance += $distance;

        $tier = 'bronze';
        $discount = 0;

        if ($user->total_distance >= 5000) {
            $tier = 'platinum';
            $discount = 15;
        } elseif ($user->total_distance >= 3000) {
            $tier = 'gold';
            $discount = 10;
        } elseif ($user->total_distance >= 1000) {
            $tier = 'silver';
            $discount = 5;
        }

        $user->loyalty_tier = $tier;
        $user->discount_percentage = $discount;
        $user->save();

        LoyaltyHistory::create([
            'user_id' => $user->id,
            'previous_tier' => $previousTier,
            'new_tier' => $tier,
            'total_distance' => $user->total_distance,
            'reward_percentage' => $discount,
        ]);

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Loyalty Updated',
            'message' =>
                'Tier Anda sekarang ' .
                ucfirst($tier) .
                ' dengan diskon ' .
                $discount .
                '%.',
        ]);
    }
}