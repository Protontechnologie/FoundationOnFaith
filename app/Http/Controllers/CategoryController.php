<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->paginate(10);
  
        return view('category.index',compact('category'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $request)
    {
        if ($request->file('category_file') != '') {
            $path_a = ($request->file('category_file'))->store('uploads/category/'.md5(Str::random(20)), 'public');
            $_POST['category_file'] = $path_a;
        }

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Category::insert($post_feilds);
            return redirect()->route('category.index')
                        ->with('success','Category created successfully');
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
    public function show(Category $category)
    {
        return view('category.create',compact('category'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($category){
            return view('category.edit',compact('category'));
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
        $category = Category::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        $category->update($request->all());
  
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
  
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
