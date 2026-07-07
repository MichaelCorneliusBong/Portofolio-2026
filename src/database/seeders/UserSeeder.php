<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'Admin@Gmail.Com'],
            ['name' => 'Super Admin', 'password' => Hash::make('Admin001')]
        );
        $user->assignRole('super_admin');

        $user = User::firstOrCreate(
            ['email' => 'User@Admin.Com'],
            ['name' => 'User Account', 'password' => Hash::make('User001')]
        );
        $user->assignRole('user');
    }
}
