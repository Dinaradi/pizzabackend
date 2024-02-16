<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'types' => 'required|array',
            'sizes' => 'required|array',
            'price' => 'required',
            'category_id' => 'required',
            'rating' => 'required',
        ]);

        $path = '';

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('products', 'public');
        }

        $requestData = $request->all();
        $requestData['image'] = $path;

        $requestData['sizes'] = json_encode($request->input('sizes'));
        $requestData['types'] = json_encode($request->input('types'));

        Product::create($requestData);

        return redirect()->route('products.index')->with('success', "Product added successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = Product::all()->find($id);
        return view ('Product.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $path = $product->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }

        $product->update([
            'image' => $path,
            'name' => $request->input('name'),
            // 'types' => $request->input('types'),
            // 'sizes' => $request->input('sizes'),
            'price' => $request->input('price'),
            'category' => $request->input('category_id'),
            'rating' => $request->input('rating'),


        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
