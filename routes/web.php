<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;

Route::get('/', [
    HomeController::class,
    'index'
])->name('home');

Route::get(
    '/packages/{package}',
    [
        PackageController::class,
        'show'
    ]
)->name('packages.show');

Route::middleware([
    'auth',
    'verified'
])->group(function () {

    Route::get(
        '/dashboard',
        function () {

            if (
                auth()->user()->role ===
                'admin'
            ) {
                return redirect()->route(
                    'admin.dashboard'
                );
            }

            return redirect()->route(
                'home'
            );
        }
    )->name('dashboard');

    Route::get(
        '/admin/dashboard',
        [
            DashboardController::class,
            'admin'
        ]
    )
    ->middleware(
        'role:admin'
    )
    ->name(
        'admin.dashboard'
    );

    Route::get(
        '/user/dashboard',
        [
            DashboardController::class,
            'user'
        ]
    )
    ->middleware(
        'role:user'
    )
    ->name(
        'user.dashboard'
    );
});

Route::middleware([
    'auth'
])->group(function () {

    Route::get(
        '/booking/{schedule}',
        [
            BookingController::class,
            'create'
        ]
    )->name(
        'booking.create'
    );

    Route::post(
        '/booking',
        [
            BookingController::class,
            'store'
        ]
    )->name(
        'booking.store'
    );

    Route::get(
        '/my-bookings',
        [
            BookingController::class,
            'index'
        ]
    )->name(
        'booking.index'
    );

    Route::get(
        '/booking/{booking}/payment',
        [
            BookingController::class,
            'payment'
        ]
    )->name(
        'booking.payment'
    );

    Route::post(
        '/booking/{booking}/pay',
        [
            BookingController::class,
            'pay'
        ]
    )->name(
        'booking.pay'
    );

    Route::post(
        '/booking/{booking}/cancel',
        [
            BookingController::class,
            'cancel'
        ]
    )->name(
        'booking.cancel'
    );

    Route::get(
        '/admin/bookings',
        [
            BookingController::class,
            'adminIndex'
        ]
    )
    ->middleware(
        'role:admin'
    )
    ->name(
        'admin.bookings'
    );

    Route::post(
        '/admin/bookings/{booking}/complete',
        [
            BookingController::class,
            'complete'
        ]
    )
    ->middleware(
        'role:admin'
    )
    ->name(
        'admin.bookings.complete'
    );

    Route::get(
        '/profile',
        [
            ProfileController::class,
            'edit'
        ]
    )->name(
        'profile.edit'
    );

    Route::patch(
        '/profile',
        [
            ProfileController::class,
            'update'
        ]
    )->name(
        'profile.update'
    );

    Route::delete(
        '/profile',
        [
            ProfileController::class,
            'destroy'
        ]
    )->name(
        'profile.destroy'
    );

    Route::prefix('admin')
    ->middleware([
        'role:admin',
    ])
    ->group(function () {

        Route::resource(
            'packages',
            AdminPackageController::class
        )->names(
            'admin.packages'
        );

        Route::resource(
            'schedules',
            ScheduleController::class
        )->names(
            'admin.schedules'
        );
    });

    Route::get(
        '/loyalty',
        [
            HomeController::class,
            'loyalty',
        ]
    )->name(
        'loyalty.index'
    );
});

require __DIR__.'/auth.php';