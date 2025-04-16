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
        Schema::create('pengaduan_bks', function (Blueprint $table) {
            $table->increments('id_pengaduan_bk');
            $table->date('tanggal');
            $table->string('jenis_pengaduan', 50);
            $table->text('isi_keluhan');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_bks');
    }
};
