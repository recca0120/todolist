<?php

use Recca0120\Todolist\Todo;
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
        $todolist->add(new Todo([
            'text' => 'todo 1',
        ]));

        $this->assertEquals([
            new Todo(['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null]),
        ], $todolist->all());

        $todolist->add(new Todo([
            'text' => 'todo 2',
        ]));

        $this->assertEquals([
            new Todo(['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null]),
            new Todo(['id' => 2, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null]),
        ], $todolist->all());

        $todolist->add(new Todo([
            'id' => 4,
            'text' => 'todo 4',
        ]));

        $this->assertEquals([
            new Todo(['id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null]),
            new Todo(['id' => 2, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null]),
            new Todo(['id' => 4, 'text' => 'todo 4', 'status' => 'new', 'completed_at' => null]),
        ], $todolist->all());
    }

    /** @test */
    public function it_should_delete_todo()
    {
        $todolist = new Todolist();
        $todolist->add(new Todo([
            'text' => 'todo 1',
        ]));

        $todolist->delete(1);

        $this->assertSame([], $todolist->all());
    }

    /** @test */
    public function it_should_get_todo()
    {
        $todolist = new Todolist();
        $todolist->add(new Todo([
            'text' => 'todo 1',
        ]));

        $this->assertEquals(new Todo([
            'id' => 1, 'text' => 'todo 1', 'status' => 'new', 'completed_at' => null,
        ]), $todolist->get(1));
    }

     /** @test */
    public function it_should_be_completed()
    {
        $todolist = new Todolist();
        $todolist->add(new Todo([
            'text' => 'todo 1',
        ]));


        $todolist->complete(1);

        $this->assertEquals(new Todo([
            'id' => 1, 'text' => 'todo 1', 'status' => 'completed', 'completed_at' => date('Y-m-d H:i:s')
        ]), $todolist->get(1));
    }

    /** @test */
    public function it_should_get_todo_and_modify()
    {
        $todolist = new Todolist();
        $todolist->add(new Todo([
            'text' => 'todo 1'
        ]));
        $todo = $todolist->get(1);

        $todo['text'] = 'todo 2';

        $this->assertEquals([
            new Todo(['id' => 1, 'text' => 'todo 2', 'status' => 'new', 'completed_at' => null]),
        ], $todolist->all());
    }
}
