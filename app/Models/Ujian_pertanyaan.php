<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian_pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'tbl_ujian_pertanyaan';
    protected $fillable = [
        'id_ujian', 'id_pertanyaan',
    ];
}
