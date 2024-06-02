<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class awards extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'title', 'description', 'date_received',
    ];

    public function student()
    {
        return $this->belongsTo(students::class);
    }
}
