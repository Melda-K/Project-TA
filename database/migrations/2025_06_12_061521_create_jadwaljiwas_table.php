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
        Schema::create('jadwaljiwas', function (Blueprint $table) {
            $table->increments('id_jadwaljiwa');
            $table->string('kategori_jadwal', 225);
            $table->string('hari', 50);
            $table->string('jam');
            $table->integer('id_spesialis_kejiwaan')->unsigned();
            $table->foreign('id_spesialis_kejiwaan')->references('id_spesialis_kejiwaan')->on('spesialis_kejiwaans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwaljiwas');
    }
};
