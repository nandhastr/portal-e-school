<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penghargaan extends Model
{
    use HasFactory;
    protected $table = 'tbl_penghargaan';
    protected $fillable = [
        'id_siswa', 'judul', 'deskripsi', 'tanggal_diterima',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
