<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'commenter_id',
        'receiver_id',
        'content',
        'field',
        'type',
        'relative_x',
        'relative_y',
        'journal_id',
        'in_class_id',
        'self_study_id'
    ];

    public $timestamps = false;

    public function commenter()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }

    public function inClass()
    {
        return $this->belongsTo(InClass::class);
    }

    public function selfStudy()
    {
        return $this->belongsTo(selfStudy::class);
    }
}
