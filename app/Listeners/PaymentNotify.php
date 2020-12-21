<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use App\Notifications\PaymentRecived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PaymentProcessed $event)
    {
        $event->user->notify(new PaymentRecived());
    }
}
