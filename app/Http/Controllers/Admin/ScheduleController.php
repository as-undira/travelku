<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageSchedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = PackageSchedule::with(
            'package'
        )->latest()->get();

        return Inertia::render(
            'Admin/Schedules/Index',
            [
                'schedules' => $schedules,
                'totalSchedules' =>
                    $schedules->count(),

                'totalQuota' =>
                    $schedules->sum(
                        'quota'
                    ),

                'remainingQuota' =>
                    $schedules->sum(
                        'remaining_quota'
                    ),
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Admin/Schedules/Create',
            [
                'packages' => Package::all()
            ]
        );
    }

    public function store(Request $r)
    {
        PackageSchedule::create($r->all());

        return redirect()->route(
            'admin.schedules.index'
        );
    }

    public function edit(
        PackageSchedule $schedule
    )
    {
        return Inertia::render(
            'Admin/Schedules/Edit',
            [
                'schedule' => $schedule,
                'packages' => Package::all()
            ]
        );
    }

    public function update(
        Request $request,
        PackageSchedule $schedule
    )
    {
        $schedule->update(
            $request->all()
        );

        return redirect()->route(
            'admin.schedules.index'
        );
    }

    public function destroy(
        PackageSchedule $schedule
    )
    {
        $schedule->delete();

        return back();
    }
    }