<?php

use App\src\Mailer;
use App\src\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testReturnsFullName()
    {
        $this->user->firstName = "Kamran";
        $this->user->lastName = "Sarwar";
        $this->assertEquals("Kamran Sarwar", $this->user->getFullName());
    }

    /**
     * @test
     */
    public function FullNameIsEmptyByDefault()
    {
        $this->assertEquals('', $this->user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('demo@gmail.com'), $this->equalTo('Hello!'))
            ->willReturn(true);
        $this->user->setMailer($mockMailer);
        $this->user->email = 'demo@gmail.com';
        $this->assertTrue($this->user->notify('Hello!'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();
        $this->user->setMailer($mockMailer);
        $this->expectException(Exception::class);
        $this->user->notify('Hello');
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testSendEmailReturnsTrue()
    {
        $this->user->email = 'demo@gmail.com';
        $mock = Mockery::mock('alias:'.Mailer::class);
        $mock->shouldReceive('send')
            ->once()
            ->with($this->user->email, 'Hello!')
            ->andReturn(true);
        $this->assertTrue($this->user->sendEmail('Hello!'));
    }
}