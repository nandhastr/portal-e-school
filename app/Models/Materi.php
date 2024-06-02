<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'tbl_materi';
    protected $fillable = [
        'judul', 'konten', 'mata_pelajaran',
    ];
}
