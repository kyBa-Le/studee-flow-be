<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'week',
        'start_date',
        'end_date'
    ];

    public function students()
    {
        return $this->belongsTo(User::class);
    }
}
