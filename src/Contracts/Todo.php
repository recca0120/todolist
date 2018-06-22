<?php

namespace Recca0120\Todolist\Contracts;

interface Todo
{
    public function toArray();

    public function fill(array $attributes);

    public function save();
}