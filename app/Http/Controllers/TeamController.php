<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get();
        return view('team.index',compact('teams'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('upload') != '') {
            $path_a = ($request->file('upload'))->store('uploads/team/'.md5(Str::random(20)), 'public');
            $_POST['upload'] = $path_a;
        }

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Team::insert($post_feilds);
            return redirect()->route('team.index')
                        ->with('success','Team created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.create',compact('team'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($team){
            return view('team.edit',compact('team'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        if ($request->file('upload') != '') {
            $path_a = ($request->file('upload'))->store('uploads/team/'.md5(Str::random(20)), 'public');
            $_POST['upload'] = $path_a;
        }
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $team = Team::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $team->update($post_feilds);
            return redirect()->route('team.index')
                        ->with('success','Team updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the team. Please try again later.');
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(team $team)
    {
        $team->delete();
  
        return redirect()->route('team.index')
                        ->with('success','Team deleted successfully');
    }
}
