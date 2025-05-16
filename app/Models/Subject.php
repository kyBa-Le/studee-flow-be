<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_name', 
        'classroom_id'
    ];

    public function goals()
    {
        return $this->hasMany(SemesterGoal::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}

