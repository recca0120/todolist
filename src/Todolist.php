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
        if (is_array($todo) === false) {
            $todo = [
                'text' => $todo,
            ];
        }

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

    public function delete($text)
    {
        $index = array_search($text, $this->items);
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function get($text)
    {
        $index = array_search($text, $this->items);

        return $this->items[$index];
    }

    private function nextId()
    {
        return count($this->items) + 1;
    }
}
