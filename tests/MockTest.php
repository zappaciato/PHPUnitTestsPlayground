<?php

use Mailer;
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mailer = new Mailer();
        $result = $mailer->sendMessage('kk@krissu.pl', 'Hello boyo!');

        var_dump($result);
    }
}