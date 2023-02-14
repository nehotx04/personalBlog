<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFollow;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register() {
        
        return view('auth.signup');
    }

    public function store() {
        
        $this->validate(request(), [
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name','lastname','username', 'email', 'password']));

        auth()->login($user);
        return redirect(route('profile',$user));
    }

    public function profile($user){
        $user = User::where('username',$user)->first();
        $posts = Post::where('user_id',$user->id)->paginate(24);
        // return dump($posts);
        return view('users.show',compact('user','posts'));
    }

    public function edit_profile(Request $request,User $user){
        if(Auth::user()->id == $user->id){

            if(!empty($request->photo)){

                $img = $request->file('photo')->store('public/imgs/profile-photos');
                $url = Storage::url($img);
                
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->username = $request->username;
                $user->description = $request->description;
                $user->photo = $url;
                $user->save();

            }else{

                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->username = $request->username;
                $user->description = $request->description;
                $user->photo = $user->photo;
                $user->save();

            }

         return redirect(route('profile',$user));
         
        }else{
            return redirect(route('posts.index'))->withErrors('Debes ser dueño de la cuenta para poder modificarla que intentabas? 😒');
        }
    }
}
