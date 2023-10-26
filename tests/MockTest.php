<?php

// use Mailer;
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer();
        // $result = $mailer->sendMessage('kk@krissu.pl', 'Hello boyo!');

        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->willReturn(true);
        $result = $mock->sendMessage('kk@krissu.pl', 'Hello boyo!');
        $this->assertTrue($result);
    }
}