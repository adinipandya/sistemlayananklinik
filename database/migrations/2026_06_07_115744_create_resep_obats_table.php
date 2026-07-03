<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_obat', function (Blueprint $table) {

            $table->id();

            $table->foreignId('rekam_medis_id')
                ->constrained('rekam_medis')
                ->cascadeOnDelete();

            $table->foreignId('obat_id')
                ->nullable()
                ->constrained('obat')
                ->nullOnDelete();

            $table->integer('jumlah');

            $table->string('aturan_pakai');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};