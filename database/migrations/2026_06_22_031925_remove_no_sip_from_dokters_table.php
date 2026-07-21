<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('dokters', 'no_sip')) {
            Schema::table('dokters', function (Blueprint $table) {
                $table->dropColumn('no_sip');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('dokters', 'no_sip')) {
            Schema::table('dokters', function (Blueprint $table) {
                $table->string('no_sip')->nullable();
            });
        }
    }
};