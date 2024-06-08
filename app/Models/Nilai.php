<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'tbl_nilai';
    protected $fillable = [
        'id_siswa', 'id_materi', 'jenis', 'id_ujian', 'id_tugas', 'id_kelas', 'nilai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
