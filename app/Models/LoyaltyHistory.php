<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'previous_tier',
        'new_tier',
        'total_distance',
        'reward_percentage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}