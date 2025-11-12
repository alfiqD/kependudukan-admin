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
        User::create([
            'name' => 'Alfiq Debriliant',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1'),
        ]);
    }
}

