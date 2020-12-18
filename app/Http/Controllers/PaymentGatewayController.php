<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function store(OrderDetails $orderDetails)
    {
        $order = $orderDetails->all();

       return $order;
    }
}
