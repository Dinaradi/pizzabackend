<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request);
          $this->validate($request, [
            // 'title'=> 'required',
        ]);

        $requestData = $request->all();
        Category::create($requestData);

        return redirect()->route('categories.index')->with('success', "Category added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::all()->find($id);
        return view ('Category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
