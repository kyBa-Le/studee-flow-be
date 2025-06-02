<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemVisitLog extends Model
{
    protected $table = 'system_visit_logs';
    protected $fillable = ['user_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
