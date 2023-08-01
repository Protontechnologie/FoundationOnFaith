<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClientAssign;
use Illuminate\Http\Request;
use Helper;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
        if(!Helper::can_view('client_assignment')){
            return view('error.permission');
        }   
        $client_assign = ClientAssign::where('is_deleted' , 0)->get();
        return view('client.index',compact('client_assign'));
    }
   
    public function create()
    {
        if(!Helper::can_create('client_assignment')){
            return view('error.permission');
        }
        $user = Auth::user();
        $clients = User::where("id" , "!=" , 1)->where("role_id" , 3)->where('is_active' , 1)->where('is_deleted', 0)->get();
        $assign_to = User::where("id" , "!=" , 1)->where("role_id" , 4)->where('is_active' , 1)->where('is_deleted', 0)->get();
        return view('client.create')->with(compact('assign_to','user','clients'));
    }
  
    public function store(Request $request)
    {
        $_POST['assign_from'] = Auth::user()->id;

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            ClientAssign::insert($post_feilds);
            return redirect()->route('client.index')
                        ->with('success','Client assigned successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    public function show(ClientAssign $clientAssign)
    {
        if(!Helper::can_view('client_assignment')){
            return view('error.permission');
        }
        return view('client.create',compact('clientAssign'));
    }
   
    public function edit($id)
    {
        if(!Helper::can_edit('client_assignment')){
            return view('error.permission');
        }

        $assign_to = User::where("id" , "!=" , 1)->where('is_active' , 1)->where('is_deleted', 0)->get();
        $clients = User::where("id" , "!=" , 1)->where("role_id" , 3)->where('is_active' , 1)->where('is_deleted', 0)->get();
        $client_assign = ClientAssign::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($client_assign){
            return view('client.edit',compact('client_assign','assign_to','clients'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }

    public function update($id, Request $request)
    {

        $token_ignore = ['_token' => '' ];
        $_POST['assign_from'] = Auth::user()->id;
        
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $task = ClientAssign::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $task->update($post_feilds);
            return redirect()->route('client.index')
                        ->with('success','Client assigning updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the client assigning. Please try again later.');
        }
    }
  
    public function destroy($id, Task $task)
    {
        if(!Helper::can_delete('client_assignment')){
            return view('error.permission');
        }
        $task = ClientAssign::where('id' , $id)->first();
        $task->is_active = 0;
        $task->is_deleted = 1;
        $task->deleted_by = Auth::user()->id;
        $task->save();

        return redirect()->route('client.index')
                        ->with('success','Client assigning deleted successfully');
    }
}
