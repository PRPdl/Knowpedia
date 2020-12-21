<?php

namespace App\Events;



use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentProcessed
{
    use Dispatchable, SerializesModels;

    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }


}
