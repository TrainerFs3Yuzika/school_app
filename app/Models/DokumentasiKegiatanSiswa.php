<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiKegiatanSiswa extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'dokumentasi_kegiatan_siswa';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];

    // Kolom yang tidak boleh diisi secara massal
    protected $guarded = [];

    // Jika Anda menggunakan timestamps, Anda tidak perlu mendefinisikan ini
    public $timestamps = true;
}
