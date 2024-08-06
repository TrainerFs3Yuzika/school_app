<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasiKegiatanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi_kegiatan_siswa', function (Blueprint $table) {
            $table->id(); // ID utama
            $table->string('judul'); // Judul dokumentasi
            $table->string('gambar'); // Nama file gambar
            $table->text('deskripsi'); // Deskripsi kegiatan
            $table->timestamps(); // Created at dan Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumentasi_kegiatan_siswa');
    }
}
