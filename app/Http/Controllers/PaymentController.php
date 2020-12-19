<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentRecived;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function show() {
        return view('payment');
    }
    public function store() {
        //Charge the bank

        $charge = [
            'amount' => 2500,
            'type' => 'Bank',
        ];

        $notification = $charge['amount'] . " has been paid through " . $charge['type'];

        if(!auth()->check()){
            return redirect(route('login'));
        }
        request()->user()->notify(new PaymentRecived($notification));
        return redirect(route('articles'));
    }
}
