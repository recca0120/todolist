<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Recca0120\Todolist\Contracts\Todo as TodoInterface;

class Todo extends Model implements TodoInterface
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'completed_at',
    ];
}
