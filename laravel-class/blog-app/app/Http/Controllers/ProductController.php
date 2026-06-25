<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('crud.list', compact('products'));
    }
    public function addview()
    {
        return view('crud.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:1',
            'sizes'       => 'required',
            'colors'      => 'required|array',
            'category'    => 'required|string|max:100',
            'brand'       => 'required|string|max:100',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        //What is a Transaction?
        //A transaction is a group of database operations that are treated as one unit of work.
        //There are only two possible outcomes:
        // Everything succeeds → Save all changes.
        // Any step fails → Undo (rollback) everything.
        DB::beginTransaction();

        try {
            // Default Image
            $imageName = 'default.jpg';

            // Upload Image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
            }

            Product::create([

                'name'        => $request->name,
                'slug'        => Str::slug($request->name) . '-' . time(),
                'description' => $request->description,
                'price'       => $request->price,
                'sizes' => $request->sizes,
                'colors'      => $request->colors,
                'category'    => $request->category,
                'brand'       => $request->brand,
                'image'       => $imageName,


            ]);
            //After all queries succeed, Laravel permanently saves the changes.
            DB::commit();

            return redirect()
                ->route('product.list')
                ->with('success', 'Product added successfully.');
        } catch (\Exception $e) {

            DB::rollBack(); //Rollback all queries

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('crud.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:1',
            'sizes'       => 'required|array',
            'colors'      => 'required|array',
            'category'    => 'required|string',
            'brand'       => 'required|string',
            'status'      => 'required|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->brand = $request->brand;
            // Store sizes as comma-separated string
            $product->sizes = implode(',', $request->sizes);
            // Store colors as JSON
            $product->colors = $request->colors;
            $product->status = $request->status;
            // Image Upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
                    File::delete(public_path('uploads/products/' . $product->image));
                }
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $product->image = $imageName;
            }
            $product->save();

            DB::commit();
            return redirect()
                ->route('product.list')
                ->with('success', 'Product Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
        {
            DB::beginTransaction();
            try {
                $product = Product::findOrFail($id);
                // Delete image if it exists
                if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
                    File::delete(public_path('uploads/products/' . $product->image));
                }
                // Delete product
                $product->delete();
                DB::commit();
                return redirect()
                        ->route('product.list')
                        ->with('success', 'Product deleted successfully.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()
                        ->route('product.list')
                        ->with('error', $e->getMessage());
            }
        }
}
