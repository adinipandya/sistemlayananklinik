<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            if (!Schema::hasColumn('dokters', 'nik')) {
                $table->string('nik', 16)->nullable()->after('nama');
            }
            if (!Schema::hasColumn('dokters', 'no_str')) {
                $table->string('no_str')->nullable()->after('nik');
            }
            if (!Schema::hasColumn('dokters', 'sip')) {
                $table->string('sip')->nullable()->after('no_str');
            }
            if (!Schema::hasColumn('dokters', 'password')) {
                $table->string('password')->nullable()->after('no_hp');
            }
        });
    }

    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn(['nik', 'no_str', 'sip', 'password']);
        });
    }
};