<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'tbl_kelas';
    protected $fillable = [
        'tingkat',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_kelas');
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

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_kelas');
    }

    public function ruangKelas()
    {
        return $this->hasMany(RuangKelas::class, 'id_kelas');
    }

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_kelas');
    }
    public function siswa(): BelongsToMany
    {
        return $this->belongsToMany(Siswa::class, 'tbl_pivot_siswa_kelas', 'id_kelas', 'id_siswa');
    }
}
