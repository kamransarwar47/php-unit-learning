<?php

use App\src\Mailer;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendReturnsTrue()
    {
        $this->assertTrue(Mailer::send('demo@example.com', 'Hello!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        Mailer::send('', 'Hello!');
    }
}