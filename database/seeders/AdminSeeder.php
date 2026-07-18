<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@travelku.com',
            'phone' => '081234567890',
            'gender' => 'L',
            'birth_date' => '2000-01-01',
            'role' => 'admin',
            'total_distance' => 0,
            'loyalty_tier' => 'bronze',
            'discount_percentage' => 0,
            'password' => bcrypt('password'),
        ]);
    }
}