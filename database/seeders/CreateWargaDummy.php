<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateWargaDummy extends Seeder
{
    /**
     * Jalankan seeder untuk tabel warga.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // gunakan lokal Indonesia

        foreach (range(1, 300) as $index) {
            DB::table('warga')->insert([
                'no_ktp' => $faker->unique()->nik(),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'pekerjaan' => $faker->jobTitle(),
                'telp' => $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
            ]);
        }
    }
}

