<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('dokters', function (Blueprint $table) {

            $table->string('nik')->unique()->nullable();

            $table->string('no_str')->unique()->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {

            $table->dropColumn([
                'nik',
                'no_str'
            ]);

        });
    }
};