<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan_pengguna extends Model
{
    use HasFactory;
    protected $table = 'tbl_kegiatan_pengguna';
    protected $fillable = [
        'id_siswa', 'kegiatan', 'tanggal_kegiatan', 'deskripsi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
