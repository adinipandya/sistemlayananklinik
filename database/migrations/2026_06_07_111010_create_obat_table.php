<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {

            $table->id();

            $table->string('nama_obat');

            $table->string('jenis_obat');

            $table->integer('stok')->default(0);

            $table->decimal('harga', 12, 0);

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};