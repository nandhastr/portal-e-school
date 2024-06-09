<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban_pengguna extends Model
{
    use HasFactory;
    protected $table = 'tbl_jawaban_pengguna';
    protected $fillable = [
        'id_siswa', 'id_materi', 'id_pertanyaan', 'id_kelas', 'id_tugas', 'id_opsi', 'jawaban', 'nilai', 'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }

    public function opsi()
    {
        return $this->belongsTo(Opsi::class, 'id_opsi');
    }
}
