<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();

        // ADMIN (5)
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Admin Sistem $i",
                'email' => "admin$i@desa.id",
                'password' => Hash::make('password'),
                'role' => 'admin',
                'profile_picture' => 'media/profile_pictures/admin.jpg',
            ]);
        }

        // STAFF DESA (15)
        for ($i = 1; $i <= 15; $i++) {
            User::create([
                'name' => "Staff Desa $i",
                'email' => "staff$i@desa.id",
                'password' => Hash::make('password'),
                'role' => 'staff_desa',
                'profile_picture' => 'media/profile_pictures/staff.jpg',
            ]);
        }

        // KEPALA DESA (10)
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Kepala Desa $i",
                'email' => "kepala$i@desa.id",
                'password' => Hash::make('password'),
                'role' => 'kepala_desa',
                'profile_picture' => 'media/profile_pictures/kepala.jpg',
            ]);
        }
    }
}
