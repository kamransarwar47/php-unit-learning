<?php

use App\src\Mailer;
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')->willReturn(true);
        $result = $mock->sendMessage('demo@gmail.com', 'Hello World!');
        $this->assertTrue($result);
    }

    public function testMailerExceptionMock()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->with($this->equalTo(''), $this->anything())
            ->will($this->throwException(new Exception()));
        $this->expectException(Exception::class);
        $mock->sendMessage('', 'Hello World!');
    }
}