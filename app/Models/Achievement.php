<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'image_link',
        'link',
        'content',
        'semester',
        'title',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
