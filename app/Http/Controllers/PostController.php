<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function store(StorePost $request)
    {
        if (!empty($request->image)) {
            $request->validate([
                'image' => 'image|max:5000'
            ]);
            $img = $request->file('image')->store('public/imgs');
            $url = Storage::url($img);

            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $url,
                'user_id' => Auth::user()->id
            ]);
        }else{
            $post = Post::create($request->all());
        }

        return redirect(route('posts.show', $post));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, StorePost $request)
    {
        $post->update($request->all());
        return redirect(route('posts.show', $post));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'));
    }
}
