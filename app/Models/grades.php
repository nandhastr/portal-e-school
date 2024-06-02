<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class grades extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id', 'materials_id', 'type', 'exam_id', 'task_id', 'grade',
    ];

    // Define the relationships
    public function student()
    {
        return $this->belongsTo(students::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(materials::class, 'materials_id');
    }

    public function exam()
    {
        return $this->belongsTo(exams::class, 'exam_id');
    }

    public function task()
    {
        return $this->belongsTo(tasks::class, 'task_id');
    }
}
