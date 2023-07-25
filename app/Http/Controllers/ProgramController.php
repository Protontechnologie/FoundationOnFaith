<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::get();
        return view('program.index',compact('programs'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
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
            $path_a = ($request->file('upload'))->store('uploads/program/'.md5(Str::random(20)), 'public');
            $_POST['upload'] = $path_a;
        }

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Programs::insert($post_feilds);
            return redirect()->route('program.index')
                        ->with('success','Program created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Programs $program)
    {
        return view('program.create',compact('program'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Programs::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($program){
            return view('program.edit',compact('program'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\program  $program
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        if ($request->file('upload') != '') {
            $path_a = ($request->file('upload'))->store('uploads/program/'.md5(Str::random(20)), 'public');
            $_POST['upload'] = $path_a;
        }
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $program = Programs::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $program->update($post_feilds);
            return redirect()->route('program.index')
                        ->with('success','Program updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the program. Please try again later.');
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $program)
    {
        $program->delete();
  
        return redirect()->route('program.index')
                        ->with('success','Program deleted successfully');
    }
}
