<?php

namespace App\Http\Controllers;

use App\Mail\NewUserEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){

        return view('articles.contact');
    }

    public function store(){

        request()->validate([
            'email' =>'email:rfc,dns'
        ]);

      Mail::to(\request('email'))
          ->send(new NewUserEmail(auth()->user()->name));

        return redirect(route('contact.show'))->with('message', 'Email Sent');

    }
}
