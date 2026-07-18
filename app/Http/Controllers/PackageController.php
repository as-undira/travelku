<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function show(Package $package)
    {
        $package->load('schedules');

        return Inertia::render(
            'Package/Show',
            [
                'package' => $package,
            ]
        );
    }
}