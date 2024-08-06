<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanSiswa extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'tagihan_siswa';

    protected $fillable = [
        'user_id',
        'payment_type',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
