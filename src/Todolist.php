<?php

namespace Recca0120\Todolist;

class Todolist
{
    private $items = [];

    public function all()
    {
        return $this->items;
    }

    public function add($todo)
    {
        $todo = is_array($todo) === true ? $todo : [
            'text' => $todo,
        ];

        if (empty($todo['id']) === true) {
            $todo['id'] = $this->nextId();
        }

        array_push($this->items, $todo);
    }

    public function edit($id, $todo)
    {
        $items = array_filter($this->items, function($todo) use ($id) {
            return $todo['id'] === $id;
        });

        $oldTodo = end($items);

        $index = array_search($oldTodo, $this->items);

        $todo = is_array($todo) === true ? $todo : [
            'text' => $todo,
        ];

        $this->items[$index] = array_merge($oldTodo, $todo);
    }

    public function delete($id)
    {
        $this->items = array_filter($this->items, function ($todo) use ($id) {
            return $todo['id'] !== $id;
        });
    }

    public function get($id)
    {
        $items = array_filter($this->items, function($todo) use ($id) {
            return $todo['id'] === $id;
        });

        return end($items);
    }

    private function nextId()
    {
        return count($this->items) + 1;
    }
}
