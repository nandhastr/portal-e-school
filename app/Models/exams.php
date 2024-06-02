<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class exams extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title', 'subject', 'duration', 'start_time', 'end_time',
    ];

    public function questions()
    {
        return $this->belongsToMany(questions::class, 'exam_questions');
    }
}
