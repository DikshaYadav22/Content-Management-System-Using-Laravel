<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Http\Requests\CreateCategoriesRequest;

class CategoriesController extends Controller
{
    
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    
    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoriesRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
