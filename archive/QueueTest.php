<?php

use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
// use Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase 
{
    //fixture of this class
    protected static $q;

    protected function setUp(): void
    {
        static::$q->clear();
    }

    public static function setUpBeforeClass(): void
    {
        //this method is run before the test
        static::$q = new Queue([1, '3', 'itemsy']);
    }

    public static function tearDownBeforeClass(): void
    {
        //this method is run AFTER the test
        static::$q = null;
    }

    public function testItemsAreEmpty()
    {

        $this->assertEquals(static::$q->getCount(), 0);
    }

    public function testItemsAreNotEmpty()
    {

        $this->setUp();
        $this->assertEquals(static::$q->getCount(), static::$q->getCount()>0);

    }

    public function testPushingNewItemToArray() 
    {

        $countBefore = static::$q->getCount();
        static::$q->push('extra_item');
        $countAfter = static::$q->getCount();
        $this->assertEquals($countBefore+1, $countAfter);
    }

    public function testPoppingIntemInTheArray()
    {
        $q = new Queue(['first', 'second', 'third']);
        $poppedItem = $q->pop();

        $this->assertEquals('first', $poppedItem);
    }
    

    public function testMaxNumberOfItemsInTheQueueException()
    {
        $this->q = new Queue(['first', 'second', 'third', 'fouth', 'fifth']);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Queue is full");
        $this->q->push('one_more');// this is where exception happens



        // $this->assertEquals($this->q->getCount(), Queue::MAX_ITEMS_NUMBER);
    }

}