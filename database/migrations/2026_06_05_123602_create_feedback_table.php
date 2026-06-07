<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id');

            $table->string('kategori');

            $table->integer('rating');

            $table->text('komentar');

            $table->text('respon')->nullable();

            $table->enum('status', [
                'Menunggu',
                'Direspon'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};