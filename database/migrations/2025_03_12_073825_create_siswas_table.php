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
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nama_siswa', 50);
            $table->string('nis',50);
            $table->string('ttl',50);
            $table->char('jenis_kelamin', 2);
            $table->string('agama', 10);
            $table->string('pendik_sebelumnya')->nullable();
            $table->char('jmlh_sodara', 10)->nullable();
            $table->string('alamat', 255);
            $table->string('nama_ayah', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->string('pekerjaan_ayah', 25)->nullable();
            $table->string('pekerjaan_ibu', 25)->nullable();
            $table->string('wali_siswa')->nullable();
            $table->string('kelas', 25);
            $table->integer('tahun_pelajaran');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
