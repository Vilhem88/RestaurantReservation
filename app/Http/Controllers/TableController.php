<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\TableFormRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $tables = Table::get();
        return view('admin.tables.index', compact('tables'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableFormRequest $request)
    {
        Table::create($request->validated());   
        return redirect()->route('tables.index')->with('success', 'A new table was created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableFormRequest $request, Table $table)
    {
        $table->update($request->validated());

        return redirect()->route('tables.index')->with('success', 'The table has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
       return $table->delete() 
       ? redirect()->route('tables.index')->with('success', 'The table has been deleted successfully!')
       : redirect()->route('tables.index')->with('error', 'An error has occurred!');
    }
}
