<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    
    public function contact(){
        return view('contact.contact');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    $correo = new ContactMailable($request->all());
    Mail::to('nehotx04@gmail.com')->send($correo);
    return redirect(route('contact.index'))->with('info','Mensaje enviado');
    }
    
}
