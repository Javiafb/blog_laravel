<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;

class tagcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = tag::all();
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        tag::create($request->all());

        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'etiqueta creada correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
       return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tag $tag)
    {
       
        $tag->update([

            'name' => $request->input('name'),

        ]);

          session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'tag actualizada correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.tag.edit',$tag);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
       $tag->delete();

        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'tag eliminada correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.tag.index');
    }
}
