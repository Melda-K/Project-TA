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
        Schema::create('penanganan_kasus_pskiaters', function (Blueprint $table) {
            $table->increments('id_penanganan_kasus_psikiater');
            $table->date('tanggal');
            $table->string('diagnosis_awal', 255);
            $table->string('terapi_diberikan', 255);
            $table->string('resep_obat', 255);
            $table->string('hasil_konsul', 255);
            $table->boolean('status_penanganan');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_spesialis_kejiwaan')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_spesialis_kejiwaan')->references('id_spesialis_kejiwaan')->on('spesialis_kejiwaans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganan_kasus_pskiaters');
    }
};
