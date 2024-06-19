<?php

namespace App\Models\PortalModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaBerprestasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_siswa_berprestasi';

    protected $guarded = [];


    // relasi ke tabel siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
