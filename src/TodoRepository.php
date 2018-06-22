<?php

namespace Recca0120\Todolist;

use Recca0120\Todolist\Contracts\TodoRepository as TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public $items = [];

    public function all()
    {
        return $this->items;
    }

    public function create(array $attributes)
    {
        array_push($this->items, $this->createTodo($attributes));
    }

    public function delete($id)
    {
        $this->items = array_filter($this->items, function ($todo) use ($id) {
            return $todo['id'] !== $id;
        });
    }

    public function get($id)
    {
        $items = array_filter($this->items, function ($todo) use ($id) {
            return $todo['id'] === $id;
        });

        return end($items);
    }

    private function nextId()
    {
        return count($this->items) + 1;
    }

    private function createTodo($attributes)
    {
        if (empty($attributes['id']) === true) {
            $attributes['id'] = $this->nextId();
        }
        $attributes['status'] = 'new';
        $attributes['completed_at'] = null;

        return new Todo($attributes);
    }
}
