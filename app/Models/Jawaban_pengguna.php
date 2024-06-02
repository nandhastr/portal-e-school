<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban_pengguna extends Model
{
    use HasFactory;
    protected $table = 'tbl_jawaban_pengguna';
    protected $fillable = [
        'id_siswa', 'id_pertanyaan', 'id_opsi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function opsi()
    {
        return $this->belongsTo(Opsi::class);
    }
}
