<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {

        $table->string('nik')->unique()->nullable();

        $table->string('no_hp')->nullable();

        $table->date('tanggal_lahir')->nullable();

        $table->string('jenis_kelamin')->nullable();

        $table->text('alamat')->nullable();

        $table->string('golongan_darah')->nullable();

        $table->text('alergi')->nullable();

        $table->string('kontak_darurat')->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
