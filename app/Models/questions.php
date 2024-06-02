<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpOption\Option;

class questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
    ];

    public function exams()
    {
        return $this->belongsToMany(exams::class, 'exam_questions');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
