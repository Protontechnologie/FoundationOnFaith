<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::get();
        return view('services.index',compact('services'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Services::insert($post_feilds);
            Helper::create_notification("Create" , "1" , "Services created by ".Auth::user()->name);
            return redirect()->route('services.index')
                        ->with('success','Services created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    public function show(Services $service)
    {
        return view('services.create',compact('service'));
    }
   
    public function edit($id)
    {
        $service = Services::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($service){
            return view('services.edit',compact('service'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }
  
    public function update($id, Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $service = Services::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {

            $service->update($post_feilds);
            Helper::create_notification("Update" , "1" , "Services updated by ".Auth::user()->name);
            return redirect()->route('services.index')->with('success','Service updated successfully');

        } catch (ValidationException $e) {

            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while updating the Service. Please try again later.');
            
        }
    }
  
    public function destroy(Services $service)
    {
        $service->delete();
        Helper::create_notification("Delete" , "1" , "Services deleted by ".Auth::user()->name);
        return redirect()->route('services.index')
                        ->with('success','Service deleted successfully');
    }
}
