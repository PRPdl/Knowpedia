<?php


namespace App\Billing;


use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{

    protected $currency;
    protected $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    function setDiscount($amount) {
        $this->discount = $amount;
    }

    function charge($amount): array
    {

        //charge the bank

        return [
            'Type' => 'Bank',
            'Amount' => ($amount)/100,
            'Discount' => ($this->discount)/100,
            'Currency' => $this->currency,
            'confirmation_number' => Str::random(),
        ];
    }
}
