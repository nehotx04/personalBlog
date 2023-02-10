<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login() {
        
        return view('auth.login');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Correo o contraseña incorrecta, porfavor intente de nuevo',
            ]);

        } else {

            // if(auth()->user()->role == 'admin') {
            //     return redirect()->route('admin.index');
            // } else {
                return redirect((route('posts.index')));
            // }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect((route('auth.login')));
    }
}
