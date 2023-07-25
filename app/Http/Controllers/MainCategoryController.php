<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maincategory = MainCategory::get();
  
        return view('maincategory.index',compact('maincategory'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maincategory.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $request)
    {
        // if ($request->file('category_file') != '') {
        //     $path_a = ($request->file('category_file'))->store('uploads/category/'.md5(Str::random(20)), 'public');
        //     $_POST['category_file'] = $path_a;
        // }

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            MainCategory::insert($post_feilds);
            return redirect()->route('maincategory.index')
                        ->with('success','Main Category created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $maincategory)
    {
        return view('maincategory.create',compact('maincategory'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maincategory = MainCategory::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($maincategory){
            return view('maincategory.edit',compact('maincategory'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
        $maincategory = MainCategory::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        $maincategory->update($request->all());
  
        return redirect()->route('maincategory.index')
                        ->with('success','Main Category updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $category)
    {
        $category->delete();
  
        return redirect()->route('maincategory.index')
                        ->with('success','Main Category deleted successfully');
    }
}
