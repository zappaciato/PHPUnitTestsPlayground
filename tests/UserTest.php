<?php


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
        $user->email  = 'kk@gmail.com';
        $message = 'Hello boyo!';
        // $this->assertTrue($user->notify($user->email, $message));
        $actual = $user->notify($message);
        $expected = "Sent" . $message . " to " . $user->email;
        $this->assertSame($expected, $actual);
    }
}
