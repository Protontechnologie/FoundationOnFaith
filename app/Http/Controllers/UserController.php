<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\attributes;
use App\Models\Department;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Helper;

class UserController extends Controller
{
    public function index()
    {
        if(!Helper::can_view('users')){
            return view('error.permission');
        }   
        $users = User::where("id" , "!=" , 1)->where('is_deleted' , 0)->get();
        return view('user.index',compact('users'));
    }
   
    public function create()
    {
        if(!Helper::can_create('users')){
            return view('error.permission');
        }
        $roles = attributes::where('attribute' , 'roles')->where('id' ,'!=' , 1)->where('is_active' , 1)->where('is_deleted', 0)->get();
        $departments = Department::where('is_active' , 1)->where('is_deleted', 0)->get();
        $teams = Team::where('is_active' , 1)->where('is_deleted', 0)->get();
        
        return view('user.create')->with(compact('roles','departments','teams'));
    }
  
    public function store(Request $request)
    {

        if ($request->file('profile_pic') != '') {
            $path_a = ($request->file('profile_pic'))->store('uploads/user/'.md5(Str::random(20)), 'public');
            $_POST['profile_pic'] = $path_a;
        }

        if ($request->password != '') {
            $password = Hash::make($request->password);
            $_POST['password'] = $password;
        }

        if ($request->type != '') {
            $_POST['role_id'] = $request->type;
        }


        $token_ignore = ['_token' => '' , 'type' => '' , 'confirm_password' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            User::insert($post_feilds);
            return redirect()->route('user.index')
                        ->with('success','User created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    public function show(User $user)
    {
        if(!Helper::can_view('users')){
            return view('error.permission');
        }
        return view('user.create',compact('user'));
    }
   
    public function edit($id)
    {
        $roles = attributes::where('attribute' , 'roles')->where('id' ,'!=' , 1)->where('is_active' , 1)->where('is_deleted', 0)->get();
        $departments = Department::where('is_active' , 1)->where('is_deleted', 0)->get();
        $teams = Team::where('is_active' , 1)->where('is_deleted', 0)->get();
        if(!Helper::can_edit('users')){
            return view('error.permission');
        }

        $user = User::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($user){
            return view('user.edit',compact('user','roles','departments','teams'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }

    public function update($id, Request $request)
    {

        if ($request->file('profile_pic') != '') {
            $path_a = ($request->file('profile_pic'))->store('uploads/user/'.md5(Str::random(20)), 'public');
            $_POST['profile_pic'] = $path_a;
        }
        if ($request->password != '') {
            $password = Hash::make($request->password);
            $_POST['password'] = $password;
        }

        if ($request->type != '') {
            $_POST['role_id'] = $request->type;
        }


        $token_ignore = ['_token' => '' , 'type' => '' , 'confirm_password' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $user = User::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $user->update($post_feilds);
            return redirect()->route('user.index')
                        ->with('success','User updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user. Please try again later.');
        }
    }
  
    public function destroy($id, User $user)
    {
        if(!Helper::can_delete('users')){
            return view('error.permission');
        }
        $user = User::where('id' , $id)->first();
        $user->is_active = 0;
        $user->is_deleted = 1;
        $user->deleted_by = Auth::user()->id;
        $user->save();

        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    }

    public function username_availability(Request $request){
        $data = $request->input('data');
        $type = $request->input('type');
        if($type == 'username'){
            if($data != ''){
                $user = User::where('username', $data)->first();
        
                if ($user) {
                    $suggested = $data . rand(1000, 9999);
                    return response()->json(['available' => false, 'suggested' => $suggested]);
                } else {
                    return response()->json(['available' => true]);
                }
            }else{
                return response()->json(['available' => false]);
            }
        }elseif($type == 'email'){
            if($data != ''){
                $user = User::where('email', $data)->first();
        
                if ($user) {
                    return response()->json(['available' => false]);
                } else {
                    return response()->json(['available' => true]);
                }
            }else{
                return response()->json(['available' => false]);
            }
        }
    }

    public function change_status(Request $request){
        $user_id = $request->input('user_id');
        $status = $request->input('status');

        $user = User::where('id', $user_id)->first();
        $user->is_active =  $status;
        $user->save();
        if($status == 1){
            return response()->json(['stat' => 'active']);
        }else{
            return response()->json(['stat' => 'blocked']);
        }
    }
}
