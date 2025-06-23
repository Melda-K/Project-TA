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
        Schema::create('belajars', function (Blueprint $table) {
           $table->increments('id_belajar');
            $table->date('tanggal');
            $table->string('permasalahan', 255);
            $table->string('mapel', 255);
            $table->unsignedInteger('id_guru');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_riwayat_bk');
            $table->foreign('id_riwayat_bk')->references('id_riwayat_bk')->on('riwayat_bks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belajars');
    }
};
