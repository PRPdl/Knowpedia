<?php


namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    private $paymentGatewayContract;
    private $discount;

    public function __construct(PaymentGatewayContract $paymentGatewayContract, $discount)
    {
        $this->paymentGatewayContract = $paymentGatewayContract;
        $this->discount = $discount;
    }

    public function all(): array
    {
        $this->paymentGatewayContract->setDiscount($this->discount);
        return [
            'name' => 'Pradip',
            'address' => '1 Yeman Road, Yeman',
            $this->paymentGatewayContract->charge(2500 - $this->discount),
        ];
    }
}
