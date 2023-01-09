<?php

namespace App\src;

class Orders
{
    public $quantity;
    public $unitPrice;
    public $amount;

    public function __construct($quantity, $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }

    public function process(PaymentGateway $gateway)
    {
        return $gateway->charge($this->amount);
    }
}