<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'tbl_kelas';

    protected $fillable = [
        'nama', 'tingkat',
    ];

    // Relasi Kelas ke Materi (Kelas has many Materi)
    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_kelas', 'id');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_kelas');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_kelas');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_kelas');
    }
}
