<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
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
    public function store(Request $request)
    {
        // dd($request->all());

        Category::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'Categoria cargada correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {

        $category->update([
            'name' => $request->input('name'),
        ]);


        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'Categoria actualizada!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
         $category->delete();

        session()->flash('swal', [
            'title' =>'Bien hecho!',
            'text' => 'Categoria eliminada!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.categories.index');
    }
}
