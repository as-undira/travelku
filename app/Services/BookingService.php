<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\PackageSchedule;

class BookingService
{
    public function create(
        $user,
        $scheduleId,
        $participant
    ) {
        $schedule =
            PackageSchedule::with(
                'package'
            )->findOrFail(
                $scheduleId
            );

        if (
            $schedule->remaining_quota <
            $participant
        ) {
            throw new \Exception(
                'Kuota tidak mencukupi.'
            );
        }

        $price =
            $schedule
                ->package
                ->price;

        $discount =
            $user
                ->discount_percentage;

        $subtotal =
            $price *
            $participant;

        $discountAmount =
            $subtotal *
            $discount / 100;

        $total =
            $subtotal -
            $discountAmount;

        $booking = Booking::create([
            'user_id' => $user->id,
            'package_schedule_id' => $scheduleId,
            'participant_count' => $participant,
            'package_price' => $price,
            'discount_percentage' => $discount,
            'total_price' => $total,
            'booking_date' => now(),
            'status' => 'pending_payment',
        ]);

        $schedule->decrement(
            'remaining_quota',
            $participant
        );

        return $booking;
    }
}