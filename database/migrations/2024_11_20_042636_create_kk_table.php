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
        Schema::create('kk', function (Blueprint $table) {
            $table->id(); // ID KK
            $table->foreignId('rw_id')->constrained('rw')->onDelete('cascade'); // Relasi ke RW
            $table->string('nomer_kk'); // Nomor KK
            $table->string('kepala_keluarga'); // Nama kepala keluarga
            $table->text('alamat'); // Alamat keluarga
            $table->integer('jumlah_anggota_keluarga'); // Jumlah anggota keluarga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kk');
    }
};
