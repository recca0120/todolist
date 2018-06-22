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
}
