<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelajaranSiswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'pembelajaran_siswa';

    protected $fillable = [
        'subject_id',
        'student_id',
        'teacher_id',
        'materi_file',
    ];

    /**
     * Get the subject associated with the pembelajaran siswa.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Get the student associated with the pembelajaran siswa.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the teacher associated with the pembelajaran siswa.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
