<?php

namespace App\Billing;

interface PaymentGatewayContract
{
    function setDiscount($amount);

    function charge($amount): array;
}
