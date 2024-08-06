<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['teacher_id', 'student_id', 'subject_id', 'score'];

    /**
     * Relasi dengan model User (guru).
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Relasi dengan model Student.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relasi dengan model Subject.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
