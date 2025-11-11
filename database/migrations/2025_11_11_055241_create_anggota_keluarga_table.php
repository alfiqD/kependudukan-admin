<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
        // Primary Key
        $table->id('anggota_id');

        // Foreign Key ke keluarga_kk
        $table->unsignedBigInteger('kk_id');

        // Foreign Key ke warga
        $table->unsignedBigInteger('warga_id');

        // Hubungan (misal: Ayah, Ibu, Anak, Dsb)
        $table->string('hubungan');

        $table->timestamps();

        // Relasi ke keluarga_kk
        $table->foreign('kk_id')
            ->references('kk_id')->on('keluarga_kk')
            ->onDelete('cascade');

        // Relasi ke warga
        $table->foreign('warga_id')
            ->references('warga_id')->on('warga')
            ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};
