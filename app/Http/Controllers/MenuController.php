<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\MenuFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::get();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuFormRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
        $menu = Menu::create([

            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $image
        ]);

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('menus.index')->with('success', 'New menu was created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::get();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {   
        
        $image = $menu->image_path;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image_path);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([

            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $image,

        ]);

        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('menus.index')->with('success', 'The Menu was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            Storage::delete($menu->image_path);
            return redirect()->route('menus.index')->with('success', 'The menu has been deleted successfully!');
        }

        return redirect()->route('menus.index')->with('error', 'An error occurred while deleting!');
    }
}
