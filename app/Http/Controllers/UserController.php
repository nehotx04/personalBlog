<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register() {
        
        return view('auth.signup');
    }

    public function store() {
        
        $this->validate(request(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name','lastname', 'email', 'password']));

        auth()->login($user);
        return redirect()->to('posts.index');
    }
}
