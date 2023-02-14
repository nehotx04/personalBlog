<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
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
            return redirect(route('search'));
        }else{
            // return dump($following);
            $followed->followers -= 1;
            $followed->save();
            $following->delete();
            return redirect(route('search'));
        }
    }
}
