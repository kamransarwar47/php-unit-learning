<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoNumbers()
    {
        $this->assertEquals(4, 2 + 2);
    }
}