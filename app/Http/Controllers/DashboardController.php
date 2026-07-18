<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function admin()
    {
        return Inertia::render(
            'Admin/Dashboard',
            [
                'totalUsers' =>
                    User::where(
                        'role',
                        'user'
                    )->count(),

                'totalPackages' =>
                    Package::count(),

                'totalBookings' =>
                    Booking::count(),

                'completedBookings' =>
                    Booking::where(
                        'status',
                        'completed'
                    )->count(),

                'pendingBookings' =>
                    Booking::where(
                        'status',
                        'pending_payment'
                    )->count(),

                'totalRevenue' =>
                    Booking::where(
                        'status',
                        'completed'
                    )->sum(
                        'total_price'
                    ),

                'platinumUsers' =>
                    User::where(
                        'loyalty_tier',
                        'platinum'
                    )->count(),

                'recentBookings' =>
                    Booking::with(
                        [
                            'user',
                            'schedule.package',
                        ]
                    )
                    ->latest()
                    ->take(5)
                    ->get(),
            ]
        );
    }

    public function user()
    {
        $user = auth()->user();

        return Inertia::render('User/Dashboard', [
            'bookingCount' => $user->bookings()->count(),
            'tier' => $user->loyalty_tier,
            'distance' => $user->total_distance,
            'discount' => $user->discount_percentage,
            'notifications' => $user->notifications()->latest()->take(5)->get(),
            'histories' => $user->loyaltyHistories()->latest()->get(),
        ]);
    }
}