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
        Schema::table('Hobi_1159', function (Blueprint $table) {
            $table->foreignId('biodata_id')
                ->nullable()
                ->constrained('Biodata_1159')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('Hobi_1159', function (Blueprint $table) {
            $table->dropForeign(['biodata_id']);
            $table->dropColumn('biodata_id');
        });
    }
};
