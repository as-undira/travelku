<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Admin/Packages/Index',
            ['packages' => Package::latest()->get()]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Admin/Packages/Create'
        );
    }

    public function store(Request $r)
    {
        Package::create($r->all());

        return redirect()->route(
            'admin.packages.index'
        );
    }

    public function edit(Package $package)
    {
        return Inertia::render(
            'Admin/Packages/Edit',
            [
                'package' => $package
            ]
        );
    }

    public function update(
        Request $request,
        Package $package
    )
    {
        $package->update(
            $request->all()
        );

        return redirect()->route(
            'admin.packages.index'
        );
    }

    public function destroy(
        Package $package
    )
    {
        $package->delete();

        return back();
    }
}