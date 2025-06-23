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
        Schema::create('priadis', function (Blueprint $table) {
            $table->increments('id_pribadi');
            $table->date('tanggal');
            $table->string('permasalahan', 255);
            $table->string('penyelesaian', 255);
            $table->unsignedInteger('id_guru');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_pelanggaran');
            $table->foreign('id_pelanggaran')->references('id_pelanggaran')->on('pelanggarans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priadis');
    }
};
