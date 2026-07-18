<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_schedule_id',
        'participant_count',
        'package_price',
        'discount_percentage',
        'total_price',
        'booking_date',
        'payment_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'datetime',
            'payment_date' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function schedule()
    {
        return $this->belongsTo(
            PackageSchedule::class,
            'package_schedule_id'
        );
    }
}