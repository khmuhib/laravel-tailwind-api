<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:255',
            'description' => 'required | string',
            'price' => 'required | string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = ('products/');
            $imagePath = $image->move($destinationPath, $name);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::find($id);

        // dd($product);
        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // return $id;
        $product = Product::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('products.edit', $product->id)
                ->withErrors($validator)
                ->withInput();
        }

        // Store the old image path
        $oldImagePath = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'products/';
            $imagePath = $image->move($destinationPath, $name);

            // Update the product with the new image path
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imagePath,
                'quantity' => $request->quantity,
            ]);

            // Delete the old image if it exists
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        } else {
            // Update the product without changing the image
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        // Delete the associated image if it exists
        if ($product->image) {
            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
