<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $image = $request->file('image')->store('public/categories');
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $image
        ]);

        return redirect()->route('categories.index')->with('success', 'A new Category was created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {   
        $image = $category->image_path;
        
        if ($request->hasFile('image')) {
            Storage::delete($category->image_path);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([

            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $image,

        ]);

        return redirect()->route('categories.index')->with('success', 'The Category was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   

        if($category->delete())
        {
            Storage::delete($category->image_path);
            return redirect()->route('categories.index')->with('success', 'The category has been deleted successfully');
        }

        return redirect()->route('categories.index')->with('error', 'An error occurred while deleting!');

    }
}
