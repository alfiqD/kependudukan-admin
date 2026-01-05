<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeristiwaKematianSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'warga_id' => $i, // pastikan warga_id 1–30 ADA
                'tgl_meninggal' => Carbon::now()->subDays(rand(30, 1000)),
                'sebab' => collect(['Sakit', 'Usia Tua', 'Kecelakaan'])->random(),
                'lokasi' => collect([
                    'Rumah',
                    'RSUD Kota',
                    'Puskesmas',
                    'Jalan Raya'
                ])->random(),
                'no_surat' => 'SKM-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('peristiwa_kematian')->insert($data);
    }
}
