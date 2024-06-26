<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'tbl_pertanyaan';
    protected $fillable = [
        'id_kelas', 'id_mapel', 'type', 'pertanyaan', 'durasi', 'waktu_mulai', 'waktu_selesai',
    ];

    public function opsi()
    {
        return $this->hasMany(Opsi::class, 'id_pertanyaan');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
    public function ruangKelas()
    {
        return $this->belongsTo(RuangKelas::class, 'id_kelas');
    }
}
