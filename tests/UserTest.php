<?php


use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testGetsTrimmedUserName(): void
    {
        require 'User.php';
        $user = new User();
        $user->first_name = 'John';
        $user->surname = 'Smith';
        $this->assertEquals($user->getFullName(), "John Smith");
    }
}
