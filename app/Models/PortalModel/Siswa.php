<?php

namespace App\Models\PortalModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_siswa';

    protected $guarded = [];

    public function prestasi()
    {
        return $this->hasMany(SiswaBerprestasi::class, 'siswa_id'); 
    }
}
