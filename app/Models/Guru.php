<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'tbl_guru';

    protected $fillable = [
        'user_id',
        'id_ruangKelas',
        'spesialisasi',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'phone',
        'gender',
        'photo',
        'tanggal_mulai',
        'kualifikasi',
        'pengalaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
