<?php

use App\src\Queue;
use App\src\QueueException;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();
        $this->assertEquals('green', $item);
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');
        $this->assertEquals('first', $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
        return $this->queue;
    }

    /**
     * @depends testMaxNumberOfItemsCanBeAdded
     */
    public function testExceptionThrownWhenAddingAnItemToFullQueue(Queue $queue)
    {
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        $queue->push('Extra Item');
    }
}