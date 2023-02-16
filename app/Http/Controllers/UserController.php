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
        $following = Follow::where('follower_id',Auth::user()->id)->where('followed_id',$user->id)->first();
        $posts = Post::where('user_id',$user->id)->paginate(24);
        // return dump($posts);
        return view('users.show',compact('user','posts','following'));
    }

    public function edit_profile(Request $request,User $user){
        if(Auth::user()->id == $user->id){
            
            if($request->is_public != null){
                $user->is_public = 1;
            }else{
                $user->is_public = 0;
            }

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

    public function follow(Request $request){
        $follower = Auth::user()->id;
        $followed = intval($request->followed_id);
        $followed = User::where('id',$followed)->first();
        $following = Follow::where('follower_id',$follower)->where('followed_id',$followed->id)->first();
        if($following == null){
            // return dump($follower,intval($followed));
            $following = Follow::create([
                'follower_id' => $follower,
                'followed_id' => $followed->id
            ]);
            $followed->followers += 1;
            $followed->save();
            // return redirect(route('profile',$user));
         return redirect(url()->previous());

        }else{
            // return dump($following);
            $followed->followers -= 1;
            $followed->save();
            $following->delete();
            // return redirect(route('profile',$user));
         return redirect(url()->previous());

        }
    }
}
