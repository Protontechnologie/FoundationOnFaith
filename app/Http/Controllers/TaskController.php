<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

use Helper;
use Auth;

class TaskController extends Controller
{
    public function index()
    {
        if(!Helper::can_view('task_assigning')){
            return view('error.permission');
        }   
        $tasks = Task::where('is_deleted' , 0)->get();
        return view('task.index',compact('tasks'));
    }
   
    public function create()
    {
        if(!Helper::can_create('task_assigning')){
            return view('error.permission');
        }
        $user = Auth::user();
        $assign_to = User::where("id" , "!=" , 1)->where("role_id" , 4)->where('is_active' , 1)->where('is_deleted', 0)->get();
        return view('task.create')->with(compact('assign_to','user'));
    }
  
    public function store(Request $request)
    {
        $_POST['assign_from'] = Auth::user()->id;

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Task::insert($post_feilds);
            Helper::create_notification("Create" , $_POST['assign_to'] , "Task created by ".Auth::user()->name);
            return redirect()->route('task.index')
                        ->with('success','Task created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    public function show(Task $task)
    {
        if(!Helper::can_view('task_assigning')){
            return view('error.permission');
        }
        return view('task.create',compact('task'));
    }
   
    public function edit($id)
    {
        $assign_to = User::where("id" , "!=" , 1)->where('is_active' , 1)->where('is_deleted', 0)->get();
        if(!Helper::can_edit('task_assigning')){
            return view('error.permission');
        }

        $task = Task::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($task){
            return view('task.edit',compact('task','assign_to'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }

    public function update($id, Request $request)
    {

        $token_ignore = ['_token' => '' ];
        $_POST['assign_from'] = Auth::user()->id;

        $post_feilds = array_diff_key($_POST , $token_ignore);

        $task = Task::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $task->update($post_feilds);
            Helper::create_notification("Updated" , $task->assign_to , "Task updated by ".Auth::user()->name);
            return redirect()->route('task.index')
                        ->with('success','Task updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the task. Please try again later.');
        }
    }
  
    public function destroy($id, Task $task)
    {
        if(!Helper::can_delete('task_assigning')){
            return view('error.permission');
        }
        $task = Task::where('id' , $id)->first();
        $task->is_active = 0;
        $task->is_deleted = 1;
        $task->deleted_by = Auth::user()->id;
        $task->save();
        Helper::create_notification("Delete" , '1' , "Task deleted by ".Auth::user()->name);
        return redirect()->route('task.index')
                        ->with('success','Task deleted successfully');
    }

    public function my_task(){
        if(!Helper::can_view('my_task')){
            return view('error.permission');
        }
        $login_user = Auth::user();
        $tasks = Task::where('assign_to' , $login_user->id)->get();
        return view('task.my_task',compact('tasks','login_user'));
    }

    public function update_mytask(Request $request)
    {
        if(!Helper::can_edit('my_task')){
            return view('error.permission');
        }
        $id = $request->request_id;
        $task = Task::where('id' , $id)->first();
        $task->task_status = $request->task_status;
        $task->comments = $request->comments;
        $task->save();
        Helper::create_notification("Task Comments" , $task->assign_from , "Add task comments by ".Auth::user()->name);

        return redirect()->route('dashboard.my_task')
                        ->with('success','Task comment added successfully');
    }

}
