<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('crud.list',compact('products'));
    }
    public function addview(){
        return view('crud.add');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required||min:3',
            'description' => 'required',
            'price' => 'required',
            'sizes' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = $request->sizes;
        $product->save();

        if($product){
            return redirect()->route('product.list')->with('success','Product added successfully');
        }  

    }

    public function edit($id){
        $product = Product::find($id);
        return view('crud.edit',compact('product'));
    }

    public function update(Request $request,$id){
         $request->validate([
            'name' => 'required||min:3',
            'description' => 'required',
            'price' => 'required',
            'sizes' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = $request->sizes;
        $product->save();
        return redirect()->route('product.list')->with('success','Product updated successfully');
    }


    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.list')->with('success','Product deleted successfully');
    }
}
