<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'completion_rate_weekly',
        'deadline_completion_rate',
        'learning_journal_feedback',
    ];

    protected function casts(): array
    {
        return [
            'completion_rate_weekly' => 'float',
            'deadline_completion_rate' => 'float',
        ];
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}