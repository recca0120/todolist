<?php

namespace App\Repositories;

use App\Todo;
use Recca0120\Todolist\Contracts\TodoRepository as TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    private $todos;

    public function __construct(Todo $todos)
    {
        $this->todos = $todos;
    }

    public function all()
    {
        return $this->todos->get();
    }

    public function create(array $attributes)
    {
        $this->todos->newInstance($attributes)->save();
    }

    public function delete($id)
    {
        $this->get($id)->delete();
    }

    public function get($id)
    {
        return $this->todos->find($id);
    }
}
