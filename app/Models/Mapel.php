<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mapel';

    protected $guarded = [];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }

    public function siswa(): BelongsToMany
    {
        return $this->belongsToMany(Siswa::class, 'tbl_pivot_siswa_mapel', 'id_mapel', 'id_siswa');
    }
}
