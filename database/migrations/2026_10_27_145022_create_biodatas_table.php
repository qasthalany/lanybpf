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
   Schema::create('Biodata_1159', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nim');
        $table->string('jurusan');
        $table->string('alamat');
        $table->string('foto_profil')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
