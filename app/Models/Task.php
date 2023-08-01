<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = [
        'title', 'details','assign_to','assign_from','task_status','deadline','comments'
    ];

    public function task_to()
    {
        return $this->belongsTo('App\Models\User', 'assign_to', 'id');
    }

    public function task_from()
    {
        return $this->belongsTo('App\Models\User', 'assign_from', 'id');
    }

    public function task_status()
    {
        $task_status = $this->task_status;
        if($task_status == "0"){
            return ['type' => 'Pending' , 'alert' => 'primary'];
        }elseif($task_status == "1"){
            return ['type' => 'Closed' , 'alert' => 'warning'];
        }elseif($task_status == "2"){
            return ['type' => 'Pending' , 'alert' => 'success'];
        }
    }
    
}
