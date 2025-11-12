<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\KeluargaKK;
use App\Models\Warga;

class CreateAnggotaKeluargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua data KK
        $daftarKK = KeluargaKK::all();

        // Ambil semua warga
        $daftarWarga = Warga::pluck('warga_id')->toArray();

        // Untuk setiap KK, buat anggota keluarga 2-4 orang
        foreach ($daftarKK as $kk) {
            // Hindari kepala keluarga jadi anggota juga
            $anggotaYangBoleh = array_diff($daftarWarga, [$kk->kepala_keluarga_warga_id]);

            // Tentukan jumlah anggota keluarga per KK (acak antara 2–4)
            $jumlahAnggota = rand(2, 4);

            // Pilih acak warga yang jadi anggota
            $anggotaDipilih = $faker->randomElements($anggotaYangBoleh, $jumlahAnggota);

            foreach ($anggotaDipilih as $wargaId) {
                DB::table('anggota_keluarga')->insert([
                    'kk_id' => $kk->kk_id,
                    'warga_id' => $wargaId,
                    'hubungan' => $faker->randomElement(['Istri', 'Anak', 'Saudara', 'Keponakan', 'Cucu']),
                ]);
            }
        }
    }
}
