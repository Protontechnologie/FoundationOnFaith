<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\RequestProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
  
        return view('product.index',compact('product'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where("is_active" , 1)->where('is_deleted', 0)->get();
        return view('product.create')->with(compact('category'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('product_file') != '') {
            $path_a = ($request->file('product_file'))->store('uploads/product/'.md5(Str::random(20)), 'public');
            $_POST['product_file'] = $path_a;
        }

        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        
        try{
            Product::insert($post_feilds);
            return redirect()->route('product.index')
                        ->with('success','Product created successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.create',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        if($product){
            return view('product.edit',compact('product'));
        }else{
            return redirect()->back()->with('error', "No record Exist");
        }
        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            // 'detail' => 'required',
        ]);
        $product = Product::where('is_active' , 1)->where('is_deleted' , 0)->where('id' , $id)->first();
        $product->update($request->all());
  
        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
  
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
