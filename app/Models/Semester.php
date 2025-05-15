<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'started_at',
        'ended_at',
        'classroom_id'
    ];

    public function semesterGoals()
    {
        return $this->hasMany(SemesterGoal::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
