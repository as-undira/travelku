<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PackageSchedule;
use App\Services\BookingService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()
            ->user()
            ->bookings()
            ->with(
                'schedule.package'
            )
            ->latest()
            ->get();

        return Inertia::render(
            'Booking/Index',
            [
                'bookings' =>
                    $bookings,
            ]
        );
    }

    public function adminIndex()
    {
        $bookings = Booking::with([
            'user',
            'schedule.package'
        ])
        ->latest()
        ->get();

        return Inertia::render(
            'Admin/Bookings',
            [
                'bookings' => $bookings,

                'totalBookings' =>
                    $bookings->count(),

                'pendingBookings' =>
                    $bookings
                        ->where(
                            'status',
                            'pending_payment'
                        )
                        ->count(),

                'paidBookings' =>
                    $bookings
                        ->where(
                            'status',
                            'paid'
                        )
                        ->count(),

                'completedBookings' =>
                    $bookings
                        ->where(
                            'status',
                            'completed'
                        )
                        ->count(),

                'cancelledBookings' =>
                    $bookings
                        ->where(
                            'status',
                            'cancelled'
                        )
                        ->count(),

                'totalRevenue' =>
                    $bookings
                        ->where(
                            'status',
                            'completed'
                        )
                        ->sum(
                            'total_price'
                        ),
            ]
        );
    }

    public function create(
        PackageSchedule $schedule
    ) {
        $schedule->load(
            'package'
        );

        return Inertia::render(
            'Booking/Create',
            [
                'schedule' =>
                    $schedule,
            ]
        );
    }

    public function store(
        Request $request,
        BookingService $service
    ) {
        $request->validate([
            'schedule_id' =>
                'required',
            'participant_count' =>
                'required|integer|min:1',
        ]);

        $service->create(
            auth()->user(),
            $request->schedule_id,
            $request->participant_count
        );

        return redirect()->route(
            'booking.index'
        );
    }

    public function pay(
        Booking $booking,
        PaymentService $service
    ) {
        if (
            $booking->user_id !==
            auth()->id()
        ) {
            abort(403);
        }

        $service->pay(
            $booking
        );

        return back();
    }

    public function cancel(
        Booking $booking,
        PaymentService $service
    ) {
        if (
            $booking->user_id !==
            auth()->id()
        ) {
            abort(403);
        }

        if (
            $booking->status !==
            'pending_payment'
        ) {
            return back();
        }

        $service->cancel(
            $booking
        );

        return back();
    }

    public function complete(
        Booking $booking,
        PaymentService $service
    ) {
        $service->complete(
            $booking
        );

        return back();
    }

    public function payment(
        Booking $booking
    ) {
        if (
            $booking->user_id !==
            auth()->id()
        ) {
            abort(403);
        }

        $booking->load(
            'schedule.package'
        );

        return Inertia::render(
            'Booking/Payment',
            [
                'booking' =>
                    $booking,
            ]
        );
    }
}