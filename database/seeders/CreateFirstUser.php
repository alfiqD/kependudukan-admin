<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Jalankan seeder untuk membuat user pertama.
     */
    public function run(): void
    {
        // Generate 120 user dummy
        foreach (range(1, 100) as $i) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }

        // User admin (opsional)
        // User::create([
        //     'name' => 'Alfiq Debriliant',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('Admin1'),
        // ]);
    }
}
