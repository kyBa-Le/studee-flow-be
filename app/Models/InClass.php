<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InClass extends Model
{
    use HasFactory;

    protected $table = 'in_class';

    protected $fillable = [
        'student_id',
        'date',
        'subject_id',
        'lesson',
        'self_assessment',
        'difficulties',
        'plan',
        'is_problem_solved',
        'week_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function journal()
    {
        return $this->belongsTo(Week::class);
    }
}
