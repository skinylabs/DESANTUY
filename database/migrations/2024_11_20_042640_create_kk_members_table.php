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
        Schema::create('kk_members', function (Blueprint $table) {
            $table->id(); // ID Anggota
            $table->foreignId('kk_id')->constrained('kk')->onDelete('cascade'); // Relasi ke KK
            $table->foreignId('ktp_id')->constrained('ktp')->onDelete('cascade'); // Relasi ke KTP
            $table->string('relationship'); // Hubungan anggota dengan kepala keluarga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kk_members');
    }
};
