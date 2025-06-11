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
        Schema::create('data_konseling_siswas', function (Blueprint $table) {
            $table->increments('id_data_konseling_siswa');
            $table->string('jenis_konseling', 255);
            $table->text('ketKonseling');
            $table->date('tanggal');
            $table->string('nama_kampus', 50);
            $table->string('prodi', 50);
            $table->string('nama_mapel', 50);
            $table->string('nama_guru', 50);
            $table->boolean('status_konseling');
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
        Schema::dropIfExists('data_konseling_siswas');
    }
};
