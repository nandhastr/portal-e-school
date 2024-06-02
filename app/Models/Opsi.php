<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opsi extends Model
{
    use HasFactory;
    protected $table = 'tbl_opsi';
    protected $fillable = [
        'id_pertanyaan', 'opsi', 'benar',
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
