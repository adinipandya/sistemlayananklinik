<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('rekam_medis', 'nadi')) {
            Schema::table('rekam_medis', function (Blueprint $table) {
                $table->string('nadi')->nullable()->after('tinggi_badan');
            });
        }

        if (!Schema::hasColumn('rekam_medis', 'respirasi')) {
            Schema::table('rekam_medis', function (Blueprint $table) {
                $table->string('respirasi')->nullable()->after('nadi');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('rekam_medis', 'respirasi')) {
            Schema::table('rekam_medis', function (Blueprint $table) {
                $table->dropColumn('respirasi');
            });
        }

        if (Schema::hasColumn('rekam_medis', 'nadi')) {
            Schema::table('rekam_medis', function (Blueprint $table) {
                $table->dropColumn('nadi');
            });
        }
    }
};