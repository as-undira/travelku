<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Agung',
            'email' => 'as@gmail.com',
            'phone' => '081234567890',
            'gender' => 'L',
            'birth_date' => '2000-01-01',
            'role' => 'user',
            'total_distance' => 0,
            'loyalty_tier' => 'bronze',
            'discount_percentage' => 0,
            'password' => bcrypt('123123'),
        ]);
    }
}