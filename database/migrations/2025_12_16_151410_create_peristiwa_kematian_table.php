<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peristiwa_kematian', function (Blueprint $table) {
            $table->id('kematian_id'); // PK

            $table->unsignedBigInteger('warga_id'); // FK ke warga

            $table->date('tgl_meninggal');
            $table->string('sebab')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('no_surat')->unique()->nullable();

            $table->timestamps();

            // Constraint
            $table->foreign('warga_id')
                ->references('warga_id')
                ->on('warga')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peristiwa_kematian');
    }
};
