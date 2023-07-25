<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestAttributes;

use Auth;
use App\Models\User;
use App\Models\attributes;
use App\Models\role_assign;
use Illuminate\Support\Str;
use Session;
use Helper;

class PayrollController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payroller()
    {
        $user = Auth::user();
        if ($user->role_id != 1) {
            return redirect()->back()->with('error', "No Link found");
        }
        
        return view('payroll/payroller');
    }
    
    public function generic_submit(RequestAttributes $request)
    {
        // $user = User::find(Auth::user()->id);
        // $columns  = \Schema::getColumnListing("attributes");
        // $ignore = ['id' , 'is_active' ,'is_deleted' , 'created_at' , 'updated_at' ,'deleted_at'];
        //$push_in = array_diff($columns, $ignore);

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            attributes::insert($post_feilds);
            return redirect()->back()->with('message', 'Information updated successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }

    public function role_assign_modal()
    {
        $user = Auth::user();
        $role_assign = role_assign::where('is_active' ,1)->where("role_id" ,$_POST['role_id'])->first();
        $att_tag = attributes::where('is_active' ,1)->select('attribute')->distinct()->get();
        $body = "";
        if ($att_tag) {
            $route = route('roleassign_submit');
            $body .= "<input type='hidden' name='role_id' id='fetch-role-id' value='".$_POST['role_id']."'>";
            if ($role_assign) {
                $checker = unserialize($role_assign->assignee);
                $body .= "<input type='hidden' name='record_id' value='".$role_assign->id."'>";
            }else{
                $checker = [];
            }
            foreach($att_tag as $key => $role){
                $body .= "<tr><td>".ucwords($role->attribute)."</td><td><div class='custom-control custom-checkbox'>
                                  <input type='checkbox' name='assignee[]' class='custom-control-input' id='customCheck1".$key."' ";
                                   if(in_array($role->attribute."_1", $checker)){ $body .= "checked"; }
                                    $body .= " value='".$role->attribute."_1'>
                                  <label class='custom-control-label' for='customCheck1".$key."'>1</label></div></td>
                            
                            <td><div class='custom-control custom-checkbox'>
                                  <input type='checkbox' name='assignee[]' class='custom-control-input' id='customCheck2".$key."' ";
                                   if(in_array($role->attribute."_2", $checker)){ $body .= "checked"; }
                                    $body .= " value='".$role->attribute."_2'>
                                  <label class='custom-control-label' for='customCheck2".$key."'>2</label></div></td>

                            <td><div class='custom-control custom-checkbox'>
                                  <input type='checkbox' name='assignee[]' class='custom-control-input' id='customCheck3".$key."' ";
                                   if(in_array($role->attribute."_3", $checker)){ $body .= "checked"; }
                                    $body .= " value='".$role->attribute."_3'>
                                  <label class='custom-control-label' for='customCheck3".$key."'>3</label></div></td>

                            <td><div class='custom-control custom-checkbox'>
                                  <input type='checkbox' name='assignee[]' class='custom-control-input' id='customCheck4".$key."' ";
                                   if(in_array($role->attribute."_4", $checker)){ $body .= "checked"; }
                                    $body .= " value='".$role->attribute."_4'>
                                  <label class='custom-control-label' for='customCheck4".$key."'>4</label></div></td></tr>";    
            }
        }
        $bod['body'] = $body;
        $response = json_encode($bod);
        return $response;
    }
}

