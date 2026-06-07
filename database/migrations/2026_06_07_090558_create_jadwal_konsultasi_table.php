<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_konsultasi', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('dokter_id')
                ->constrained('dokters')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->time('jam');

            $table->text('keluhan');

            $table->enum(
                'status',
                [
                    'Menunggu',
                    'Disetujui',
                    'Selesai',
                    'Dibatalkan'
                ]
            )->default('Menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_konsultasi');
    }
};