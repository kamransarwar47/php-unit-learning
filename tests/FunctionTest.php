<?php

use PHPUnit\Framework\TestCase;
require 'functions.php';

class FunctionTest extends TestCase
{
    public function testAddReturnsCorrectSum()
    {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(5, add(3, 2));
    }

    public function testAddDoesNotReturnCorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}