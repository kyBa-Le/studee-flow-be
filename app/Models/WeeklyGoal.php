<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;    

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

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }   

}
