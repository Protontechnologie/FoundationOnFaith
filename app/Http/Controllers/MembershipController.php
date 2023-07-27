<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Helper;
use Auth;

class MembershipController extends Controller
{
    public function index()
    {
        if(!Helper::can_view('membership')){
            return view('error.permission');
        }
        $memberships = Membership::where("is_active" , 1)->where('is_deleted' , 0)->get();
        return view('membership.index',compact('memberships'));
    }
   
    public function create()
    {
        if(!Helper::can_create('membership')){
            return view('error.permission');
        }
        return view('membership.create');
    }
  
    public function store(Request $request)
    {
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Membership::insert($post_feilds);
            return redirect()->route('membership.index')
                        ->with('success','Membership created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    public function show(Membership $membership)
    {
        if(!Helper::can_view('membership')){
            return view('error.permission');
        }
        return view('membership.create',compact('Membership'));
    }

    public function edit($id)
    {
        if(!Helper::can_edit('membership')){
            return view('error.permission');
        }
        $membership = Membership::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($membership){
            return view('membership.edit',compact('membership'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
    }
  
    public function update($id, Request $request)
    {
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);

        $membership = Membership::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();

        try {
            $membership->update($post_feilds);
            return redirect()->route('membership.index')
                        ->with('success','Membership updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the membership. Please try again later.');
        }
    }
  
    public function destroy($id, Request $request)
    {
        if(!Helper::can_delete('membership')){
            return view('error.permission');
        }
        $membership = Membership::where('id' , $id)->first();
        $membership->is_active = 0;
        $membership->is_deleted = 1;
        $membership->deleted_by = Auth::user()->id;
        $membership->save();
        return redirect()->route('membership.index')
                        ->with('success','Membership deleted successfully');
    }
}
