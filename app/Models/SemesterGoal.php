<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterGoal extends Model
{
    protected $fillable = [
        'student_id',
        'subject_id',
        'semester_id',
        'self_goals',
        'teacher_goals',
        'course_goals',
        'is_achieved',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}