<?php

use App\src\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        $gateway  = $this->getMockBuilder('App\src\PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();
        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);
        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = Mockery::mock('App\src\PaymentGateway');
        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);
        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}