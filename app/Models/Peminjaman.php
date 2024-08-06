<?php
// app/Models/Peminjaman.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = ['book_id', 'user_id', 'tanggal_pinjam', 'tanggal_kembali', 'jumlah_buku', 'status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
