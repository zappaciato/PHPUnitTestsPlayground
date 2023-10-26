<?php

use Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase 
{
    public function testItemsAreNotEmpty()
    {
        $q = new Queue([1,2,3,'itemsy']);
        
        $this->assertEquals(!empty($q->getCount()), true);
    }

    public function testItemsAreEmpty()
    {
        $q = new Queue([]);

        // $this->assertEquals(empty($q->getCount()), true);
        $this->assertEmpty($q->getCount());
    }


    public function testPushingNewItemToArray() 
    {
        $q = new Queue([1, 2, 3, 'itemsy']);
        $countBefore = $q->getCount();
        $q->push('extra_item');
        $countAfter = $q->getCount();
        $this->assertEquals($countBefore+1, $countAfter);
    }

    public function testPoppingIntemInTheArray()
    {
        $q = new Queue([1, 2, 3, 'itemsy']);
        $firstItem = $q[0];
        $poppedItem = $q->pop();

        $this->assertEquals($firstItem, $poppedItem);
    }
    
}