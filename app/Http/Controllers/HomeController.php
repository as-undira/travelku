<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::with(
            'schedules'
        )
            ->where(
                'status',
                'available'
            )
            ->get();

        $loyalty = null;

        if (auth()->check()) {

            $loyalty =
                $this->getLoyaltyData();
        }

        return Inertia::render(
            'Home',
            [
                'packages' => $packages,
                'loyalty' => $loyalty,
            ]
        );
    }

    public function loyalty()
    {
        $user = auth()->user();

        $loyalty =
            $this->getLoyaltyData();

        $histories = Booking::with(
            'schedule.package'
        )
            ->where(
                'user_id',
                $user->id
            )
            ->where(
                'status',
                'completed'
            )
            ->latest()
            ->get()
            ->map(function (
                $booking
            ) {

                return [
                    'id' =>
                        $booking->id,

                    'package' =>
                        $booking
                            ->schedule
                            ?->package
                            ?->name,

                    'distance' =>
                        $booking
                            ->distance_earned
                            ?? 0,

                    'date' =>
                        $booking
                            ->updated_at
                            ->format(
                                'd M Y'
                            ),
                ];
            });

        return Inertia::render(
            'Loyalty/Index',
            [
                'loyalty' =>
                    $loyalty,

                'histories' =>
                    $histories,
            ]
        );
    }

    private function getLoyaltyData()
    {
        $user = auth()->user();

        $nextTier = match (
            $user->loyalty_tier
        ) {
            'bronze' => [
                'name' => 'Silver',
                'target' => 1000,
                'discount' => 5,
            ],

            'silver' => [
                'name' => 'Gold',
                'target' => 3000,
                'discount' => 10,
            ],

            'gold' => [
                'name' => 'Platinum',
                'target' => 5000,
                'discount' => 15,
            ],

            default => null,
        };

        $remaining = $nextTier
            ? max(
                0,
                $nextTier['target']
                - $user->total_distance
            )
            : 0;

        $progress = $nextTier
            ? min(
                100,
                (
                    $user->total_distance
                    /
                    $nextTier['target']
                ) * 100
            )
            : 100;

        return [
            'tier' =>
                $user->loyalty_tier,

            'distance' =>
                $user->total_distance,

            'discount' =>
                $user
                    ->discount_percentage,

            'nextTier' =>
                $nextTier,

            'remaining' =>
                $remaining,

            'progress' =>
                round(
                    $progress
                ),
        ];
    }
}