<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acara extends Model
{
    use HasFactory;
    protected $table = 'tbl_acara';
    protected $fillable = [
        'id_siswa', 'judul', 'deskripsi', 'tanggal_acara', 'lokasi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
