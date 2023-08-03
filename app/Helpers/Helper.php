<?php

namespace App\Helpers;
use Auth;
use App\Models\role_assign;
use App\Models\Notifications;
use Illuminate\Http\Request;

class Helper
{
    public static function curren_user()
    {
    	$user = Auth::user();
        return $user;
    }

    public static function create_sidebar($data)
    {
    	$user = Auth::user();
    	$temp = array();
    	foreach ($data as $key => $value) {
			$name = explode('_', $value);
    		if (!in_array($name[0], $temp)) {
    			$temp[$key] = $name[0];
    		}
    	}
        return array_values($temp);
    }

    public static function check_rights($slug)
    {
        $user = Auth::user();
        $temp = array();
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if (str_contains($value , $slug)) {
                if (!in_array($value, $temp)) {
                    $temp[$key] = $value;
                }
            }
            
        }
        return array_values($temp);
    }

    public static function can_create($slug='')
    {
        $user = Auth::user();
        if($user->is_active == 1){
            $temp = false;
            $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
            $verify = unserialize($role_assign->assignee);
            foreach ($verify as $key => $value) {
                if ($value == $slug."_1") {
                    $temp = true;
                }
            }
            return $temp;
        }else{
            return false;
        }
    }

    public static function can_view($slug='')
    {
        $user = Auth::user();
        if($user->is_active == 1){
            $temp = false;
            $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
            $verify = unserialize($role_assign->assignee);
            foreach ($verify as $key => $value) {
                if ($value == $slug."_2") {
                    $temp = true;
                }
            }
            return $temp;
        }else{
            return false;
        }
        
        
    }


    public static function can_edit($slug='')
    {
        $user = Auth::user();
        $temp = false;
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug."_3") {
                $temp = true;
            }
        }
        return $temp;
    }

    public static function can_delete($slug='')
    {
        $user = Auth::user();
        $temp = false;
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug."_4") {
                $temp = true;
            }
        }
        return $temp;
    }

    public static function create_notification($type , $assign_to, $msg)
    {
        $user = Auth::user();
        $notification = new Notifications;
        $notification->user_id = $user->id;
        $notification->type = $type;
        $notification->assign_to = $assign_to;
        $notification->msg = $msg;
        $notification->save();
        return true;
    }

    public static function generate_notification()
    {
        $user = Auth::user();
        if($user->role_id == 1){
            $notifications = Notifications::where('is_active' ,1)->orderBy('id', 'desc')->get();
        }else{
            $notifications = Notifications::where('is_active' ,1)->where("assign_to" ,$user->id)->get();
        }
        $body = '';
        if(count($notifications) > 0){
            foreach($notifications as $notification){
                $createdAt = $notification->created_at;
                $humanReadableTime = $createdAt->diffForHumans();
                $body .= '<li>
                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                        <div class="media">
                            <img src="'.asset($notification->notify_to->profile_pic).'" alt="'.$notification->notify_to->name.'" class="d-flex mr-3 img-fluid rounded-circle">
                            <div class="media-body">
                                <p class="mb-0 text-warning">'.$notification->msg.'</p>
                                '.$humanReadableTime.'
                            </div>
                        </div>
                    </a>
                </li>';
            }
        }else{
            $body = '<li>
                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                        <div class="media">
                            <div class="media-body">
                                <p class="mb-0 text-success">Hurray, No more Notification</p>
                            </div>
                        </div>
                    </a>
                </li>';
        }
        return $body;
    }


}