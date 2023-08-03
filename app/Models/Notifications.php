<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'type','user_id', 'assign_to','is_seen','msg'
    ];

    public function notify_to()
    {
        return $this->belongsTo('App\Models\User', 'assign_to', 'id');
    }

}
