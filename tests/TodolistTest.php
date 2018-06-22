<?php

use PHPUnit\Framework\TestCase;
use Recca0120\Todolist\Todolist;

class TodolistTest extends TestCase
{
    /** @test */
    public function it_should_create_instance()
    {
        $this->assertInstanceOf(Todolist::class, new Todolist());
    }

    /** @test */
    public function it_should_add_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');

        $this->assertEquals([
            ['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null],
        ], $todolist->all());

        $todolist->add([
            'text' => 'todo 2',
        ]);

        $this->assertEquals([
            ['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null],
            ['id' => 2, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null],
        ], $todolist->all());

        $todolist->add([
            'id' => 4,
            'text' => 'todo 4',
        ]);

        $this->assertEquals([
            ['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null],
            ['id' => 2, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null],
            ['id' => 4, 'text' => 'todo 4', 'status' => 'new', 'completed_at' => null],
        ], $todolist->all());
    }

    /** @test */
    public function it_should_edit_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');
        $todolist->edit(1, 'todo 2');

        $this->assertEquals([
            ['id' => 1, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null],
        ], $todolist->all());
    }

    /** @test */
    public function it_should_delete_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');
        $todolist->delete(1);

        $this->assertSame([], $todolist->all());
    }

    /** @test */
    public function it_should_get_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');

        $this->assertEquals([
            'id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null,
        ], $todolist->get(1)->toArray());
    }

     /** @test */
    public function it_should_be_completed()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');

        $todolist->complete(1);

        $this->assertEquals([
            'id' => 1, 'text' => 'todo 1', 'status' => 'completed', 'completed_at' => date('Y-m-d H:i:s')
        ], $todolist->get(1)->toArray());
    }

    /** @test */
    public function it_should_get_todo_and_modify()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');
        $todo = $todolist->get(1);

        $todo['text'] = 'todo 2';

        $this->assertEquals([
            ['id' => 1, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null],
        ], $todolist->all());
    }
}
