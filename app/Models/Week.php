<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'week',
        'started_date',
        'end_date'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
