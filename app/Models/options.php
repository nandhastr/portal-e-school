<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class options extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id', 'option', 'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(questions::class);
    }
}
