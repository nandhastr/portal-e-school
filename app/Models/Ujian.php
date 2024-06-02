<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ujian extends Model
{
    use HasFactory;
    protected $table = 'tbl_ujian';
    protected $fillable = [
        'judul', 'mata_pelajaran', 'durasi', 'waktu_mulai', 'waktu_selesai',
    ];

    public function pertanyaan()
    {
        return $this->belongsToMany(Pertanyaan::class, 'Ujian_pertanyaan');
    }
}
