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
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id_surat');
            $table->date('tanggal');
            $table->string('jenis_surat', 20);
            $table->string('deskripsi', 255);
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_spesialis_kejiwaan')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_spesialis_kejiwaan')->references('id_spesialis_kejiwaan')->on('spesialis_kejiwaans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
