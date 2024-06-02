<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_answers extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'question_id', 'option_id',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }

    public function question()
    {
        return $this->belongsTo(questions::class);
    }

    public function option()
    {
        return $this->belongsTo(options::class);
    }
}
