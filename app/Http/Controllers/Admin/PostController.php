<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
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
        return view('admin.posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'content'=> 'required',
        ]);
        $data = $request->all();
        $post->update($data);
        return redirect()->route('adminposts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('adminposts.index');
    }
}
