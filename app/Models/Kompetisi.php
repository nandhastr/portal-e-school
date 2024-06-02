<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kompetisi extends Model
{
    use HasFactory;
    protected $table = 'tbl_kompetisi';
    protected $fillable = [
        'id_siswa', 'judul', 'deskripsi', 'tanggal_partisipasi', 'hasil',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
