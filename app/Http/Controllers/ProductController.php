<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $allProduct=Product::all();
        return view('admin.product.index', compact('allProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory=Category::all(); 
        $allManufacturer=Manufacturer::all(); 
        return view('admin.product.create',compact('allCategory','allManufacturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
        $new = new Product;
        $new->category_id       = $request->get('category_id');
        $new->manufacturer_id       = $request->get('manufacturer_id');
        $new->product_name       = $request->get('product_name');
        $new->product_short_description       = $request->get('product_short_description');
        $new->product_long_description       = $request->get('product_long_description');
        $new->product_price       = $request->get('product_price');
        
        
        $dir =  public_path('Productimg/');//set path to http://localhost/ecommerce/public/Productimg/
        $extension = strtolower($request->file('product_image')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('product_image')->move($dir, $fileName);//move img
        $new->product_image = $fileName;//add to object
        
        



        
        $new->product_size       = $request->get('product_size');
        $new->product_color       = $request->get('product_color');
        $new->publication_status       = $request->get('publication_status');
        $new->save();
        return Redirect()->route('product.index')->with('success','Product Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCategory=Category::all(); 
        $allManufacturer=Manufacturer::all(); 
        $product=Product::find($id);
        
        return view('admin.product.edit', compact('allCategory','allManufacturer','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Product::find($id)->update($request->all());
        $new = Product::find($id);
        $new->category_id       =       $request->get('category_id');
        $new->manufacturer_id       =       $request->get('manufacturer_id');
        $new->product_name       =      $request->get('product_name');
        $new->product_short_description       =         $request->get('product_short_description');
        $new->product_long_description       =      $request->get('product_long_description');
        $new->product_price       =         $request->get('product_price');
        
        
        $dir =  public_path('Productimg/');//set path to http://localhost/ecommerce/public/Productimg/
        if ($new->product_image != '' && File::exists($dir . $new->product_image))File::delete($dir . $new->product_image);
        $extension = strtolower($request->file('product_image')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('product_image')->move($dir, $fileName);//move img
        $new->product_image = $fileName;//add to object
        
        



        
        $new->product_size       = $request->get('product_size');
        $new->product_color       = $request->get('product_color');
        $new->publication_status       = $request->get('publication_status');
        $new->save();

        return Redirect()->route('product.index')->with('info','Product Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $new = Product::find($id);
        $new->delete();
       return Redirect()->route('product.index')->with('warning','Product Deleted successfully!');
    }
}
