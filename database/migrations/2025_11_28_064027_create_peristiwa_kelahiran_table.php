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
    Schema::create('peristiwa_kelahiran', function (Blueprint $table) {
        $table->id('kelahiran_id');

        // bayi yang lahir
        $table->unsignedBigInteger('warga_id'); // bayi

        // data kelahiran
        $table->date('tgl_lahir');
        $table->string('tempat_lahir');

        // ayah dan ibu
        $table->unsignedBigInteger('ayah_warga_id');
        $table->unsignedBigInteger('ibu_warga_id');

        // nomor akta kelahiran
        $table->string('no_akta')->unique();

        $table->timestamps();

        // Foreign Keys
        $table->foreign('warga_id')
            ->references('warga_id')->on('warga')
            ->onDelete('cascade');

        $table->foreign('ayah_warga_id')
            ->references('warga_id')->on('warga')
            ->onDelete('cascade');

        $table->foreign('ibu_warga_id')
            ->references('warga_id')->on('warga')
            ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('peristiwa_kelahiran');
}


};
