<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class materials extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'subject',
    ];
}
