<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeeklyGoal extends Model
{
    use HasFactory;
    
    protected $table = 'weekly_goals';
    protected $fillable = [
        'student_id',
        'week_id',
        'goal',
        'is_achieved',
    ];
}
