<?php

namespace App\Helpers;
use Auth;
use App\Models\role_assign;

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
        $temp = false;
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug."_1") {
                $temp = true;
            }
        }
        return $temp;
    }

    public static function can_view($slug='')
    {
        $user = Auth::user();
        $temp = false;
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$user->role_id)->first();
        $verify = unserialize($role_assign->assignee);
        foreach ($verify as $key => $value) {
            if ($value == $slug."_2") {
                $temp = true;
            }
        }
        return $temp;
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

}