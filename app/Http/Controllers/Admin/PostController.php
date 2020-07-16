<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category', 'tags')->get(); //with serve come un filtro e possiamo passare piu di un attributo. in questo caso 'tags'
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];
        return view('admin.posts.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'content'=> 'required',
            'img_link' =>'image|max:1024'
        ]);

        $data = $request->all();
        $slug =  Str::of($data['title'])->slug('-');
        $data['slug'] = $slug;
        //img_
        if ($data['img_link']) {
            $imgLink = Storage::put('uploads', $data['img_link']);
            $data['img_link'] = $imgLink;
        }

        $newPost = new Post;
        $newPost->fill($data);
        $newPost->save();

        //faccio controllo che l'utente abbia selezionato almeno un tag. altrimento da errore
        if (!empty($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
        }

        return redirect()->route('adminposts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'post' => $post,
            'categories'=> $categories,
            'tags' => $tags
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
        //In questo caso devo prevedere che l'utente non voglia mantere la tag selezionata -- detach
        if (empty($data['tags'])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data['tags']);
        }
        return redirect()->route('adminposts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('adminposts.index');
    }
}
