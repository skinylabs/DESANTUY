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
        Schema::create('data_desas', function (Blueprint $table) {
            $table->id();
            $table->string("nama_desa");
            $table->integer("nomer_hp")->unique();
            $table->string("alamat");
            $table->string('email')->unique();
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desas');
    }
};
