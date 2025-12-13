<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PeristiwaKelahiranSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        if (count($wargaIds) < 3) {
            $this->command->warn('Data warga belum cukup!');
            return;
        }

        $usedBayiIds = [];

        // Pastikan folder storage media ada
        if (!Storage::disk('public')->exists('media')) {
            Storage::disk('public')->makeDirectory('media');
        }

        for ($i = 1; $i <= 30; $i++) {
            // Pilih bayi random yang belum dipakai
            do {
                $bayi = $wargaIds[array_rand($wargaIds)];
            } while (in_array($bayi, $usedBayiIds));
            $usedBayiIds[] = $bayi;

            // Pilih ayah & ibu berbeda
            do { $ayah = $wargaIds[array_rand($wargaIds)]; } while ($ayah == $bayi);
            do { $ibu = $wargaIds[array_rand($wargaIds)]; } while ($ibu == $bayi || $ibu == $ayah);

            // Pilih foto acak dari 4 foto
            $fotoIndex = rand(1, 4);
            $sourceFile = public_path('media/kelahiran'.$fotoIndex.'.jpg'); // sumber dari public/media
            $destFileName = 'kelahiran'.$i.'.jpg'; // nama unik di storage

            if (file_exists($sourceFile)) {
                // Copy ke storage/app/public/media
                Storage::disk('public')->putFileAs('media', $sourceFile, $destFileName);

                // Attach ke media DB
                DB::table('media')->insert([
                    'ref_table'  => 'warga',
                    'ref_id'     => $bayi,
                    'file_name'  => $destFileName,
                    'mime_type'  => 'image/jpeg',
                    'sort_order' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert data peristiwa kelahiran
            DB::table('peristiwa_kelahiran')->insert([
                'warga_id'      => $bayi,
                'ayah_warga_id' => $ayah,
                'ibu_warga_id'  => $ibu,
                'tgl_lahir'     => now()->subDays(rand(1, 1500)),
                'tempat_lahir'  => 'RSUD Kabupaten',
                'no_akta'       => 'AKT-' . strtoupper(Str::random(10)),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info('✅ Seeder Peristiwa Kelahiran selesai. 30 bayi sudah dibuat dengan media foto acak di storage.');
    }
}
