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
        Schema::create('kariers', function (Blueprint $table) {
           $table->increments('id_karier');
            $table->date('tanggal');
            $table->string('kampus', 255);
            $table->string('prodi', 255);
            $table->string('keterangan', 255);
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
        Schema::dropIfExists('kariers');
    }
};
