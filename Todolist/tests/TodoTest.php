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

    /** @test */
    public function it_should_get_value_like_property()
    {
        $todo = new Todo([
            'id' => 1,
            'text' => 'todo 1',
        ]);

        $this->assertSame(1, $todo->id);
        $this->assertSame('todo 1', $todo->text);
        $this->assertSame('new', $todo->status);
        $this->assertSame(null, $todo->completed_at);
    }

    /** @test */
    public function it_should_execute_insert_sql()
    {
        $todo = new Todo([
            'text' => 'todo 1',
        ]);

        $this->assertSame('insert', $todo->save());
    }

    /** @test */
    public function it_should_execute_update_sql()
    {
        $todo = new Todo([
            'id' => 1,
            'text' => 'todo 1',
        ]);

        $this->assertSame('update', $todo->save());
    }
}