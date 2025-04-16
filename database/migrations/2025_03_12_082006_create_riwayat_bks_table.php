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
        Schema::create('riwayat_bks', function (Blueprint $table) {
            $table->increments('id_riwayat_bk');
            $table->string('jenis_masalah', 255);
            $table->string('deks_masalah', 255);
            $table->string('proses_lanjutan', 255);
            $table->string('penyelesaian', 255);
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_data_konseling_siswa')->unsigned();
            $table->integer('id_pengaduan_bk')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_data_konseling_siswa')->references('id_data_konseling_siswa')->on('data_konseling_siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pengaduan_bk')->references('id_pengaduan_bk')->on('pengaduan_bks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_bks');
    }
};
