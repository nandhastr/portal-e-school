<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'tbl_pengumuman';
    protected $fillable = [
        'gambar', 'jenis', 'judul', 'konten',
    ];
}
