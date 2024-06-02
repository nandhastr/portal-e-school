<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class competitions extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'title', 'description', 'date_participated', 'result',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
