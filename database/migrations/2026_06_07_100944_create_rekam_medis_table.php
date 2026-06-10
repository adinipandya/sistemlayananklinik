<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('jadwal_konsultasi_id')
                ->constrained('jadwal_konsultasi')
                ->cascadeOnDelete();

            $table->string('tekanan_darah')->nullable();

            $table->string('suhu_tubuh')->nullable();

            $table->string('berat_badan')->nullable();

            $table->string('tinggi_badan')->nullable();

            $table->text('diagnosa');

            $table->text('tindakan')->nullable();

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};