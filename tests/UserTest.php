<?php


// use Exception;
use Mailer;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testGetsTrimmedUserName(): void
    {
        // require 'User.php';
        $user = new User();
        $user->first_name = 'John';
        $user->surname = 'Smith';
        $this->assertEquals($user->getFullName(), "John Smith");
    }

    public function testUserNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new User();
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
        ->method('sendMessage')->with($this->equalTo('kk@krissu.pl'), $this->equalTo('Hello boyo!'))
        ->willReturn(true);
        $user->setMailer($mock_mailer);
        $user->email  = 'kk@krissu.pl';
        $message = 'Hello boyo!';
        $this->assertTrue($user->notify($message));
        // $actual = $user->notify($message);
        // $expected = "Sent" . $message . " to " . $user->email;
        // $this->assertSame($expected, $actual);


    }


    public function testConnotNotifyUserWithNoEmail()
    {

        $user = new User();
        $mock_mailer = $this->getMockBuilder(Mailer::class)->onlyMethods(['sendMessage'])->getMock();

        $user->setMailer($mock_mailer);
        $mock_mailer->method('sendMessage')
        ->willThrowException(new Exception());
        $this->expectException(Exception::class);
        $user->notify('Hello boyo!');

    }
}
