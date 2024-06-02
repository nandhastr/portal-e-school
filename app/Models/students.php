<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class students extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'user_id', 'class_id', 'batch', 'internship_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(tasks::class);
    }

    public function userActivities()
    {
        return $this->hasMany(user_activities::class);
    }

    public function awards()
    {
        return $this->hasMany(awards::class);
    }

    public function competitions()
    {
        return $this->hasMany(competitions::class);
    }

    public function events()
    {
        return $this->hasMany(events::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(user_answers::class);
    }
}
