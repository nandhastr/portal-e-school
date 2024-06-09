<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mapel';

    protected $fillable = [
        'id_kelas', 'user_id', 'mata_pelajaran',  'deskripsi',
    ];

    // Relasi mapel ke Kelas (mapel belongs to Kelas)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}
