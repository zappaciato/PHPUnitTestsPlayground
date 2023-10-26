<?php

use Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase 
{
    //fixture of this class
    protected $q;

    protected function setUp(): void
    {
        $this->q = new Queue([1, 2, 3, 'itemsy']);
    }

    public function testItemsAreEmpty()
    {
        $q = new Queue([]);
        $this->assertEquals($q->getCount(), 0);
    }

    public function testItemsAreNotEmpty()
    {
        $this->setUp();
        $this->assertEquals($this->q->getCount(), $this->q->getCount()>0);

        return $this->q;
    }

    public function testPushingNewItemToArray() 
    {

        $countBefore = $this->q->getCount();
        $this->q->push('extra_item');
        $countAfter = $this->q->getCount();
        $this->assertEquals($countBefore+1, $countAfter);
    }

    public function testPoppingIntemInTheArray()
    {
        unset($this->q);
        
        $q = new Queue(['first', 'second', 'third']);
        $poppedItem = $q->pop();

        $this->assertEquals('first', $poppedItem);
    }
    
}