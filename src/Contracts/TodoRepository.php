<?php

namespace Recca0120\Todolist\Contracts;

interface TodoRepository
{
    public function all();

    public function create(array $attributes);

    public function delete($id);

    public function get($id);
}