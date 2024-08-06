<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'jumlah_denda',
        'lunas',
    ];

    // app/Models/Tagihan.php
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
