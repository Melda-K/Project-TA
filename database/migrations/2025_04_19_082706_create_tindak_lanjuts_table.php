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
        Schema::create('tindak_lanjuts', function (Blueprint $table) {
            $table->increments('id_tindak_lanjut');
            $table->string('tindakan_tindak_lanjut', 255);
            $table->string('kategori_tindak_lanjut', 255);
            $table->string('jenis_tindak_lanjutan', 255);
            $table->date('tanggal');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_riwayat_bk')->unsigned();
            $table->integer('id_pelanggaran')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_riwayat_bk')->references('id_riwayat_bk')->on('riwayat_bks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pelanggaran')->references('id_pelanggaran')->on('pelanggarans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjuts');
    }
};
