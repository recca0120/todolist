<?php

use Recca0120\Todolist\Todo;
use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    /** @test */
    public function it_should_create_instance()
    {
        $this->assertInstanceOf(Todo::class, new Todo());
    }

    /** @test */
    public function it_should_be_like_array()
    {
        $todo = new Todo([
            'id' => 1,
            'text' => 'todo 1',
        ]);

        $this->assertSame(1, $todo['id']);
        $this->assertSame('todo 1', $todo['text']);
        $this->assertSame('new', $todo['status']);
        $this->assertSame(null, $todo['completed_at']);
    }
}