<?php

namespace Recca0120\Todolist;

class Todolist
{
    private $items = [];

    public function all()
    {
        return $this->items;
    }

    public function add($text)
    {
        array_push($this->items, $text);
    }

    public function edit($oldText, $newText)
    {
        $index = array_search($oldText, $this->items);
        $this->items[$index] = $newText;
    }
}
