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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id_feedback');
            $table->string('catatan_guru_bk');
            $table->string('status', 255);
            $table->integer('id_pengaduan_bk')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_pengaduan_bk')->references('id_pengaduan_bk')->on('pengaduan_bks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
