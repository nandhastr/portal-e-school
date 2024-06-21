<?php

namespace App\Models\PortalModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'tbl_berita';

    protected $guarded  = [];
}
