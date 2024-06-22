<?php

namespace App\Models\PortalModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur_org extends Model
{
    use HasFactory;

    protected $table = 'tbl_struktur_org'; 

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru'); 
    }
}
