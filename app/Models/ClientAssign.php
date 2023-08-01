<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAssign extends Model
{
    use HasFactory;
    protected $table = 'client_assign';
    protected $fillable = [
        'client_id','assign_to','assign_from','comments'
    ];

    public function assigned_to()
    {
        return $this->belongsTo('App\Models\User', 'assign_to', 'id');
    }

    public function assigned_from()
    {
        return $this->belongsTo('App\Models\User', 'assign_from', 'id');
    }

    public function client_detail()
    {
        return $this->belongsTo('App\Models\User', 'client_id', 'id');
    }
}
