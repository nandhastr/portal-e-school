<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_activities extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'activity', 'activity_date', 'description',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
