<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'is_read',
        'link',
        'receiver_id',
        'creator',
        'deadline'
    ];

    protected $casts = [
        'is_read' => 'boolean'
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
