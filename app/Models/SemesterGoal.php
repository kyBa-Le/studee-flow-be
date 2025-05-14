<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'semester_id',
        'module',
        'goals',
        'is_achieved',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
