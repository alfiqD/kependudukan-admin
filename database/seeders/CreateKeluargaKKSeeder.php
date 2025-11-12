<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Warga;

class CreateKeluargaKKSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil 7 warga acak tanpa duplikat untuk dijadikan kepala keluarga
        $wargaList = Warga::inRandomOrder()->take(7)->get();

        foreach ($wargaList as $warga) {
            DB::table('keluarga_kk')->insert([
                'kk_nomor' => $faker->unique()->numerify('3512###########'),
                'kepala_keluarga_warga_id' => $warga->warga_id,
                'alamat' => $faker->address(),
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
