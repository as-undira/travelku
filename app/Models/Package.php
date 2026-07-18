<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination',
        'duration_days',
        'price',
        'distance_km',
        'thumbnail',
        'description',
        'facilities',
        'itinerary',
        'status',
    ];

    public function schedules()
    {
        return $this->hasMany(PackageSchedule::class);
    }
}