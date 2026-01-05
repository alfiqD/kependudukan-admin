<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PeristiwaPindahSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua warga_id
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        if (count($wargaIds) < 1) {
            $this->command->warn('Data warga belum tersedia!');
            return;
        }

        $usedWarga = [];

        for ($i = 1; $i <= 30; $i++) {

            // Pilih warga yang belum dipakai
            do {
                $warga = $wargaIds[array_rand($wargaIds)];
            } while (in_array($warga, $usedWarga));

            $usedWarga[] = $warga;

            DB::table('peristiwa_pindah')->insert([
                'warga_id'      => $warga,
                'tgl_pindah'    => Carbon::now()->subDays(rand(10, 1200)),
                'alamat_tujuan' => collect([
                    'Jakarta Selatan',
                    'Bandung',
                    'Surabaya',
                    'Yogyakarta',
                    'Medan',
                    'Makassar'
                ])->random(),
                'alasan'        => collect([
                    'Pekerjaan',
                    'Pendidikan',
                    'Menikah',
                    'Mengikuti Keluarga',
                    null
                ])->random(),
                'no_surat'      => 'SPP-' . strtoupper(Str::random(8)),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info('✅ Seeder Peristiwa Pindah berhasil membuat 30 data.');
    }
}
