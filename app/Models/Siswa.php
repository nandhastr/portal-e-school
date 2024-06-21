<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $guarded = [];


    public function penghargaan(): HasMany
    {
        return $this->hasMany(Penghargaan::class, 'id_siswa');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kelas(): BelongsToMany
    {
        return $this->belongsToMany(Kelas::class, 'tbl_pivot_siswa_kelas', 'id_siswa', 'id_kelas');
    }

    public function tugas(): HasMany
    {
        return $this->hasMany(Tugas::class, 'id_siswa');
    }

    public function kegiatan_pengguna(): HasMany
    {
        return $this->hasMany(Kegiatan_pengguna::class, 'id_siswa');
    }

    public function jawaban_pengguna(): HasMany
    {
        return $this->hasMany(Jawaban_pengguna::class);
    }

    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class, 'id_siswa');
    }

    public function mapel(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'tbl_pivot_siswa_mapel', 'id_siswa', 'id_mapel');
    }
    public function ruangKelas(): BelongsToMany
    {
        return $this->belongsToMany(RuangKelas::class, 'tbl_pivot_siswa_ruangKelas', 'id_siswa', 'id_ruangKelas');
    }
}
