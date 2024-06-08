<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'tbl_materi';

    protected $fillable = [
        'id_kelas', 'judul', 'konten', 'mata_pelajaran', 'file_path',
    ];

    // Relasi Materi ke Kelas (Materi belongs to Kelas)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
