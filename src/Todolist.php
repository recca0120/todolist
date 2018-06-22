<?php

namespace Recca0120\Todolist;

class Todolist
{
    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function all()
    {
        return $this->todoRepository->all();
    }

    public function add(Todo $todo)
    {
        $this->todoRepository->create($todo->toArray());
    }

    public function delete($id)
    {
        $this->todoRepository->delete($id);
    }

    public function get($id)
    {
        return $this->todoRepository->get($id);;
    }

    public function complete($id)
    {
        $this->get($id)->fill([
            'status' => 'completed',
            'completed_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
