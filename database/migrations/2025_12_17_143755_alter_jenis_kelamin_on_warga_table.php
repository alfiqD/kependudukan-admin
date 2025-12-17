<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Perluas enum sementara untuk mengakomodasi semua value lama + baru
        Schema::table('warga', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan','L','P'])->change();
        });

        // Step 2: Update data lama menjadi L / P
        DB::table('warga')->where('jenis_kelamin', 'Laki-laki')->update(['jenis_kelamin' => 'L']);
        DB::table('warga')->where('jenis_kelamin', 'Perempuan')->update(['jenis_kelamin' => 'P']);

        // Step 3: Restrict enum hanya L / P
        Schema::table('warga', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L','P'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan enum ke nilai lama
        Schema::table('warga', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan'])->change();
        });

        // Update data kembali ke value lama
        DB::table('warga')->where('jenis_kelamin', 'L')->update(['jenis_kelamin' => 'Laki-laki']);
        DB::table('warga')->where('jenis_kelamin', 'P')->update(['jenis_kelamin' => 'Perempuan']);
    }
};
