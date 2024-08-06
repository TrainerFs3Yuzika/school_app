<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarEskul extends Model
{
    protected $table = 'eskul_user'; // Nama tabel pivot yang sesuai

    protected $fillable = [
        'eskul_id',
        'user_id',
    ];

    // Relasi ke model Eskul
    public function eskul()
    {
        return $this->belongsTo(Eskul::class, 'eskul_id');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
