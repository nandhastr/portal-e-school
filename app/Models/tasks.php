<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tasks extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'student_id', 'title', 'description', 'file_path', 'deadline', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
