<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Helper;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Helper::can_view('department')){
            return view('error.permission');
        }
        $departments = Department::latest()->paginate(10);
        return view('departments.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('departments.create');
    // }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
  
        Department::create($request->all());
        Helper::create_notification("Create" , "1" , "Department created by ".Auth::user()->name);
   
        return redirect()->route('departments.index')
                        ->with('success','department created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    // public function show(Department $department)
    // {
    //     return view('departments.show',compact('department'));
    // }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    // public function edit(Department $department)
    // {
    //     return view('departments.edit',compact('department'));
    // }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, department $department)
    {
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
  
        $department->update($request->all());
        Helper::create_notification("Update" , "1" , "Department updated by ".Auth::user()->name);
  
        return redirect()->route('departments.index')
                        ->with('success','department updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        Helper::create_notification("Delete" , "1" , "Department deleted by ".Auth::user()->name);
  
        return redirect()->route('departments.index')
                        ->with('success','department deleted successfully');
    }
}
