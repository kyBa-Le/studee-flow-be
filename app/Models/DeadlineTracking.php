<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeadlineTracking extends Model
{
    protected $table = "deadline_tracking";

    protected $fillable = [
        "student_id",
        "count_on_time",
        "count_missing",
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
