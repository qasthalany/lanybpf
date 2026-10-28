<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Proyek_1159', function (Blueprint $table) {
            $table->id();

            $table->foreignId('portofolio_id')
                ->constrained('Portofolio_1159')
                ->cascadeOnDelete();

            $table->string('nama_proyek');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->string('teknologi')->nullable();
            $table->date('tanggal_proyek')->nullable();
            $table->string('gambar')->nullable();
            $table->string('link_proyek')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Proyek_1159');
    }
};
