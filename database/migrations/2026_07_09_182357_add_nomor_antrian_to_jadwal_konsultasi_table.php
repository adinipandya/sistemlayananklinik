<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('jadwal_konsultasi', 'nomor_antrian')) {
            Schema::table('jadwal_konsultasi', function (Blueprint $table) {
                $table->string('nomor_antrian')->nullable()->after('updated_at');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('jadwal_konsultasi', 'nomor_antrian')) {
            Schema::table('jadwal_konsultasi', function (Blueprint $table) {
                $table->dropColumn('nomor_antrian');
            });
        }
    }
};