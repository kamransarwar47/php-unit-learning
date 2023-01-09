<?php

namespace App\src;

class Product
{
    protected $productId;

    public function __construct()
    {
        $this->productId = rand();
    }
}