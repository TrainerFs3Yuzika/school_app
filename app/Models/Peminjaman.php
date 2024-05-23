<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // Tambahkan ini

    protected $fillable = ['book_id', 'nama_peminjam', 'tanggal_pinjam', 'tanggal_kembali', 'jumlah_buku', 'status'];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
