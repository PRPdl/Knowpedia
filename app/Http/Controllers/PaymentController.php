<?php

namespace App\Http\Controllers;


use App\Events\PaymentProcessed;
use App\Models\User;
use App\Notifications\PaymentRecived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class PaymentController extends Controller
{
    public function show() {

        return view('payment');
    }
    public function store(User $user) {

        //Charge the bank

        if(!auth()->check()){
            return redirect(route('login'));
        }

        \App\Jobs\PaymentProcessed::dispatch(auth()->user());


        return redirect(route('payment.show'));
    }
}
