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

        $this->assertSame(['todo 1'], $todolist->all());
    }

    /** @test */
    public function it_should_edit_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');
        $todolist->edit('todo 1', 'todo 2');

        $this->assertSame(['todo 2'], $todolist->all());
    }

    /** @test */
    public function it_should_delete_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');
        $todolist->delete('todo 1');

        $this->assertSame([], $todolist->all());
    }

    /** @test */
    public function it_should_get_todo()
    {
        $todolist = new Todolist();
        $todolist->add('todo 1');

        $this->assertSame('todo 1', $todolist->get('todo 1'));
    }
}
