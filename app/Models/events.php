<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class events extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'title', 'description', 'event_date', 'location',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
