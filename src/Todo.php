<?php

namespace Recca0120\Todolist;

use ArrayAccess;

class Todo implements ArrayAccess
{
    private $attributes;

    public function __construct($attributes = [])
    {
        $this->attributes = array_merge([
            'status' => 'new',
            'completed_at' => null,
        ], $attributes);
    }

    public function offsetSet($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function offsetExists($key) {
        return isset($this->attributes[$key]);
    }

    public function offsetUnset($key) {
        unset($this->attributes[$key]);
    }

    public function offsetGet($key) {
        return $this->attributes[$key];
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function fill($attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }
}