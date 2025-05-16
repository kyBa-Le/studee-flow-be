<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfStudy extends Model
{
    use HasFactory;

    protected $table = 'self_study';

    protected $fillable = [
        'user_id',
        'date',
        'subject_id',
        'lesson',
        'time_allocation',
        'learning_resources',
        'learning_activities',
        'concentration',
        'is_follow_plan',
        'evaluation',
        'reinforcing_learning',
        'notes',
        'week_id',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }
}
