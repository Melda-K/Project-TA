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
        Schema::create('penanganan_kasus_psikologs', function (Blueprint $table) {
            $table->increments('id_penanganan_kasus_psikolog');
            $table->date('tanggal');
            $table->string('kesimpulan_sementara', 255);
            $table->string('ket_penanganan', 255);
            $table->string('rekomendasi_lanjut', 255);
            $table->boolean('status');
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
        Schema::dropIfExists('penanganan_kasus_psikologs');
    }
};
