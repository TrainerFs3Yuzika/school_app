<?php
// app/Models/Eskul.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    protected $table = 'eskuls'; // Nama tabel yang sesuai dengan nama tabel yang Anda buat

    protected $fillable = [
        'nama_eskul',
        'pembina',
        'waktu_eskul',
        'gambar',
    ];

    // Relasi dengan model Student
    public function users()
    {
        return $this->belongsToMany(User::class, 'eskul_user', 'eskul_id', 'user_id');
    }
}
