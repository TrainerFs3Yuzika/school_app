<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    protected $fillable = ['subject_id', 'class', 'days', 'time_start', 'time_end'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

}
