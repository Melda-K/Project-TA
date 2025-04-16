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
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->increments('id_pelanggaran');
            $table->string('nama_wali_kelas', 50);
            $table->date('tanggal');
            $table->integer('point_pelanggaran');
            $table->integer('jmlh_pelanggaran');
            $table->integer('saldo_pelanggaran');
            $table->string('keterangan', 255);
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggarans');
    }
};
