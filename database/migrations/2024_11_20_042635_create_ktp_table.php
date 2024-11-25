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
            $table->id();
            $table->foreignId('kk_id')->constrained('kk')->onDelete('cascade'); // Relasi ke tabel KK
            $table->string('nik')->unique(); // Nomor KTP
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('Tempat lahir');
            $table->date('tanggal_lahir');
            $table->string('golongan_darah');
            $table->string('agama');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('pas_foto');
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
