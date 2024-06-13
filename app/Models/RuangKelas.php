<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;
    protected $table = 'tbl_ruangKelas';
    protected $fillable = ['nama', 'id_kelas'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_ruangKelas');
    }

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_ruangKelas');
    }
}
