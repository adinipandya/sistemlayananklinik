<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->string('hari_praktek')->nullable()->after('status');
            $table->string('jam_praktek')->nullable()->after('hari_praktek');
        });
    }

    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn([
                'hari_praktek',
                'jam_praktek'
            ]);
        });
    }
};