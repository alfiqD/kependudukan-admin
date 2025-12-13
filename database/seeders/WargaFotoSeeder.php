<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WargaFotoSeeder extends Seeder
{
    public function run(): void
    {
        // Kita pilih 30 warga pertama sebagai bayi
        $bayiIds = DB::table('warga')->orderBy('warga_id')->limit(30)->pluck('warga_id');

        foreach ($bayiIds as $i => $wargaId) {
            $fotoFile = 'media/kelahiran'.($i+1).'.jpg';

            if (Storage::disk('public')->exists($fotoFile)) {
                DB::table('media')->insert([
                    'warga_id'   => $wargaId,
                    'file_name'  => 'kelahiran'.($i+1).'.jpg',
                    'mime_type'  => 'image/jpeg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
