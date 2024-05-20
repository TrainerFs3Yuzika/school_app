<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'class_name',
        'student_id',
        'teacher_id',
        'start_time',
        'end_time',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); // Sesuaikan dengan foreign key
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id'); // Sesuaikan dengan foreign key
    }
}
