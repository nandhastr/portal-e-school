<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'tbl_pertanyaan';
    protected $fillable = [
        'pertanyaan',
    ];

    public function ujian()
    {
        return $this->belongsToMany(Ujian::class, 'Ujian_pertanyaan');
    }

    public function opsi()
    {
        return $this->hasMany(Opsi::class);
    }
}
