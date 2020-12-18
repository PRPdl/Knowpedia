<?php


namespace App\Billing;


use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;


    /**
     * CreditPaymentGateway constructor.
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    function charge($amount): array
    {
        return [
            'Type' => 'Credit Card',
            'Amount' => ($amount)/100,
            'Charge' => '2.7%',
            'Discount' => ($this->discount)/100,
            'Currency' => $this->currency,
            'confirmation_number' => Str::random(),
        ];
    }
}
