<?php

use App\src\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();
        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('productId');
        $property->setAccessible(true);
        $value = $property->getValue($product);
        $this->assertIsInt($value);
    }
}