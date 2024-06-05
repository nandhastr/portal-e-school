<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $fillable = [
        'user_id',
        'id_kelas',
        'angkatan',
        'status',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nama_ibu',
        'foto',
        'sekolah_sebelumnya',
        'nisn',
        'phone',
        'gender',
        'tahun_masuk',
        'kelas_sekarang',
        'status_beasiswa',
        'catatan_prestasi',
        'catatan_disiplin',
        'informasi_kesehatan',
    ];

    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class, 'id_siswa');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function kegiatan_pengguna()
    {
        return $this->hasMany(Kegiatan_pengguna::class, 'id_siswa');
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    public function kompetisi()
    {
        return $this->hasMany(Kompetisi::class);
    }

    public function acara()
    {
        return $this->hasMany(Acara::class);
    }

    public function jawaban_pengguna()
    {
        return $this->hasMany(Jawaban_pengguna::class);
    }
}
