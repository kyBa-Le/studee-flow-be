<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;
    protected $table = 'deadlines';

    protected $fillable = [
        "started_at",
        "ended_at",
        "date",
        "title",
        "classroom_id"
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
