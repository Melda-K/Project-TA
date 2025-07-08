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
        Schema::create('pribasoss', function (Blueprint $table) {
            $table->increments('id_pribasos');
            $table->date('tanggal');
            $table->string('jenis_konseling', 255);
            $table->string('permasalahan', 255);
            $table->string('penyelesaian', 255);
            $table->unsignedInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
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
