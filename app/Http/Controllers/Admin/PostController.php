<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'content'=> 'required',
        ]);
        $data = $request->all();
        $slug =  Str::of($data['title'])->slug('-');
        $data['slug'] = $slug;
        $newPost = new Post;
        $newPost->fill($data);
        $newPost->save();
        return redirect()->route('adminposts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $data = [
            'post' => $post,
            'categories'=> $categories
        ];
        return view('admin.posts.edit', $data);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'content'=> 'required',
        ]);
        $data = $request->all();
        $slug =  Str::of($data['title'])->slug('-');
        $data['slug'] = $slug;
        $post->update($data);
        return redirect()->route('adminposts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('adminposts.index');
    }
}
