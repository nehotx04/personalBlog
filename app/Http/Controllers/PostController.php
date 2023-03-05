<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Models\Like;
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
            $img = $request->file('image')->store('public/imgs/posts');
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
        $posts = Post::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = Comment::where('post_id',$post->id)->paginate(10);
        $liked = Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
        return view('posts.show', compact('post','comments','liked'));
    }

    public function update(Post $post, StorePost $request)
    {
        if(Auth::user()->id == $post->user_id){

            if(!empty($request->image)){
                if(file_exists(public_path($post->image))){
                    unlink(public_path($post->image));
                }

                $img = $request->file('image')->store('public/imgs/posts');
                $url = Storage::url($img);
                
                $post->title = $request->title;
                $post->body = $request->body;
                $post->image = $url;
                $post->user_id = Auth::user()->id;
                $post->save();

            }else{
                if(Storage::exists($post->image)){
                    return dump(Storage::exists($post->image));
                    Storage::delete($post->image);
                }
                
                $post->title = $request->title;
                $post->body = $request->body;
                $post->user_id = Auth::user()->id;
                $post->image = $post->image;
                $post->save();

            }

         return redirect(route('posts.show',$post));
         
        }else{
            return redirect(route('posts.show',$post));
        }
    }

    public function destroy(Post $post)
    {
        if(Auth::user()->id == $post->user_id){
            $post->delete();
            return redirect(route('posts.index'));
        }else{
            return redirect(route('posts.index'))->withErrors(['message'=>'No eres propietario de este post']);
        }
    }

    //Posts functions end

    public function search(Request $request){
        $search = $request->search;
        $users = User::query();
        $users = $users->where(function ($q) use ($search) {
            $q->orWhere('name', 'like', "%{$search}%");
            $q->orWhere('lastname', 'like', "%{$search}%");
        });
        $follow = Follow::query();
        $users = $users->paginate(24);
        return view('search',compact('users','search','follow'));
    }

    public function get_search(){
        return view('search');
    }

    public function postComment(Request $request){
        $request->validate([
            'user_id' => 'int',
            'post_id' => 'int'
        ]);
        $comment = Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'post_id' => intval($request->post_id)
        ]);
        $post = Post::where('id',intval($request->post_id))->first();
        $post->comments += 1;
        $post->save();
        return redirect(url()->previous());
    }

    public function like(Request $request){
        $post = Post::where('id',$request->post_id)->first();
        $user = Auth::user()->id;
        $liked = Like::where('post_id',$post->id)->where('user_id',$user)->first();
        if(empty($liked)){
            $like = Like::create([
                'user_id' => $user,
                'post_id' => $post->id
            ]);
            $post->likes +=1;
            $post->save();
        }else{
            $liked->delete();
            $post->likes -=1;
            $post->save();
        }
        return redirect(url()->previous());
    }
}
