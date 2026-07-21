<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('dokters', 'sip')) {
            Schema::table('dokters', function (Blueprint $table) {
                $table->string('sip')->nullable()->after('nama');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('dokters', 'sip')) {
            Schema::table('dokters', function (Blueprint $table) {
                $table->dropColumn('sip');
            });
        }
    }
};