<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tbl_tugas';
    protected $fillable = [
        'id_siswa', 'id_kelas', 'id_mapel', 'judul', 'deskripsi', 'file_path', 'deadline', 'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'id_tugas');
    }
}
