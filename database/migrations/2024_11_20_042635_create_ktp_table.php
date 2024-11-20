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
        Schema::create('ktp', function (Blueprint $table) {
            $table->id(); // ID KTP
            $table->string('nik')->unique(); // Nomor KTP
            $table->string('nama'); // Nama lengkap
            $table->string('jenis_kelamin'); // Jenis kelamin
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->text('alamat'); // Alamat lengkap
            $table->string('agama'); // Agama
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ktp');
    }
};
