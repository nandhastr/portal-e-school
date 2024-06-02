<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tbl_tugas';
    protected $fillable = [
        'id_siswa', 'judul', 'deskripsi', 'file_path', 'deadline', 'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
