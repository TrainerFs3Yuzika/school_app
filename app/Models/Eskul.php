<?php
// app/Models/Eskul.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    protected $table = 'eskuls'; // Nama tabel yang sesuai dengan nama tabel yang Anda buat

    protected $fillable = [
        'student_id', // Menambahkan 'student_id' ke dalam $fillable
        'nama_eskul',
        'pembina',
        'waktu_eskul',
        'gambar',
    ];

    // Relasi dengan model Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
