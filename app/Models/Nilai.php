<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;


    protected $table = 'tbl_nilai';
    protected $fillable = [
        'id_siswa', 'id_materi', 'jenis', 'id_ujian', 'id_tugas', 'nilai',
    ];

    // Define the relationships
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'id_ujian');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }
}
