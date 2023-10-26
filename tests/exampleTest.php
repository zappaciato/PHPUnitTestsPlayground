<?php

use PHPUnit\Framework\TestCase;


class exampleTest extends TestCase
{

    /**
     * Undocumented function
     *
     * @param [type] $numberOne
     * @param [type] $numberTwo
     * @return void
     * @dataProvider dataProvider
     */
    public function testAddingTwoNumbers($numberOne, $numberTwo, $result)
    {
        $this->assertEquals($numberOne + $numberTwo, $result);
    }


    public static function dataProvider()
    {

        return [
            [2, 2, 4],
            [3, 3, 6],
            [5, 5, 10]
        ];
    }
}
