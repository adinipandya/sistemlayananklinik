<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'hari_praktek')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('hari_praktek')->nullable()->after('status');
            });
        }

        if (!Schema::hasColumn('users', 'jam_praktek')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('jam_praktek')->nullable()->after('hari_praktek');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'jam_praktek')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('jam_praktek');
            });
        }

        if (Schema::hasColumn('users', 'hari_praktek')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('hari_praktek');
            });
        }
    }
};