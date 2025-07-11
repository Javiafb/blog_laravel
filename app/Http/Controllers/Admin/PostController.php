<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::all();
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = \App\Models\Category::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    return $request->all();
        $data = Post::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::id(),
        ]);


        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'Post cargado correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.post.edit', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tag = tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([

            'slug' => 'unique:posts,slug,' . $post->id,

        ]);


        $oldImage = $post->image_path;

        // Si hay nueva imagen, guárdala, si no, deja la anterior
        $newImage = $request->file('image')
            ? $request->file('image')->store('posts', 'public')
            : $post->image_path;


        // Detectamos si se activó por primera vez
        $wasUnpublished = !$post->is_published;
        $willBePublished = $request->input('is_published');

        $post->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'category_id' => $request->input('category_id'),
            'tag_id' => $request->input('tag_id'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
            'image_path' => $newImage,
            'is_published' => $willBePublished,
        ]);


        // Solo si se publica por primera vez, añadimos la fecha
        if ($wasUnpublished && $willBePublished) {
            $post['published_at'] = now();
        }

        $post->save();

        if ($request->file('image') && $oldImage && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }

        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'Post actualizado correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.post.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        // Si la imagen existe, eliminarla
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }

        session()->flash('swal', [
            'title' => 'Bien hecho!',
            'text' => 'Post eliminado correctamente!',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.post.index');
    }
}
