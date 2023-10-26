<?php

use Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase 
{

    public function testItemsAreEmpty()
    {
        $q = new Queue([]);
        // $this->assertEquals(empty($q->getCount()), true);
        $this->assertEmpty($q->getCount());
    }

    public function testItemsAreNotEmpty()
    {
        $q = new Queue([1,2,3,'itemsy']);
        $this->assertEquals(!empty($q->getCount()), true);

        return $q;
    }


    /**
     * Undocumented function
     * @depends testItemsAreNotEmpty
     *
     * @return void
     */
    public function testPushingNewItemToArray(Queue $q) 
    {

        $countBefore = $q->getCount();
        $q->push('extra_item');
        $countAfter = $q->getCount();
        $this->assertEquals($countBefore+1, $countAfter);
    }

    /**
     * Undocumented function
     * @depends testItemsAreNotEmpty
     * @return void
     */
    public function testPoppingIntemInTheArray(Queue $q)
    {

        $q->push('lastOne');
        $poppedItem = $q->pop();

        $this->assertEquals('lastOne', $poppedItem);
    }
    
}