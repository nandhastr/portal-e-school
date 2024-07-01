<?php

namespace App\Models\PortalModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'tbl_event';
    protected $guarded = [] ;
}
