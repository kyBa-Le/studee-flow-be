<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['class_name'];

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers_classrooms', 'classroom_id', 'teacher_id');
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);
    }
}
