<?php

namespace Recca0120\Todolist;

use ArrayAccess;
use Recca0120\Todolist\Contracts\Todo as TodoInterface;

class Todo implements TodoInterface, ArrayAccess
{
    private $attributes;

    public function __construct($attributes = [])
    {
        $this->attributes = array_merge([
            'status' => 'new',
            'completed_at' => null,
        ], $attributes);
    }

    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function __get($key)
    {
        return $this->attributes[$key];
    }

    public function offsetSet($key, $value)
    {
        $this->{$key} = $value;
    }

    public function offsetExists($key)
    {
        return isset($this->{$key});
    }

    public function offsetUnset($key)
    {
        unset($this->{$key});
    }

    public function offsetGet($key)
    {
        return $this->{$key};
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function fill(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    public function save()
    {
        return isset($this->id) === false ? 'insert' : 'update';
    }
}