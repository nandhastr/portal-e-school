<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class teachers extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'user_id', 'specialization',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
