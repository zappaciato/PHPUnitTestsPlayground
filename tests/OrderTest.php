<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;


class OrderTest extends MockeryTestCase
{

    // public function testOrderIsProcessed()
    // {
    //     $gateway = $this->getMockBuilder(PaymentGatewayInterface::class)->onlyMethods(['charge'])->getMock();
    //     // $gateway->method('charge')->willReturn(true);
    //     // Set up expectations for the mock
    //     $gateway->expects($this->once())
    //         ->method('charge')
    //         ->with($this->equalTo(269)) //tutaj ida expected arguments po kolei1
    //         ->willReturn(true);
    //     $order = new Order($gateway);
    //     $order->amount = 269; 

    //     $this->assertTrue($order->process());
    // }


    public function testOrderIsProcessedMockery()
    {

        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')->once()->with(269)->andReturn(true);
        $order = new Order($gateway);
        $order->amount = 269;

        $this->assertTrue($order->process());
    }

    }


