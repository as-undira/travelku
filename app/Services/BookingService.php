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
            PackageSchedule::findOrFail(
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
            $schedule->package->price;

        $discount =
            $user->discount_percentage;

        $subtotal =
            $price * $participant;

        $total =
            $subtotal -
            ($subtotal * $discount / 100);

        return Booking::create([
            'user_id' => $user->id,
            'package_schedule_id' => $scheduleId,
            'participant_count' => $participant,
            'package_price' => $price,
            'discount_percentage' => $discount,
            'total_price' => $total,
            'booking_date' => now(),
            'status' => 'pending_payment',
        ]);
    }
}