<?php

namespace App\src;

class Order
{
    public $amount;
    protected $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}