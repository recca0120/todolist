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
                'id' => $this->nextId(),
                'text' => $todo,
            ];
        }

        array_push($this->items, $todo);
    }

    public function edit($oldText, $newText)
    {
        $index = array_search($oldText, $this->items);
        $this->items[$index] = $newText;
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
