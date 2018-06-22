<?php

use App\Todo;
use Recca0120\Todolist\Todolist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Todolist $todolist) {
    $todolist->add(new Todo(['text' => 'todo 1']));

    $todos = $todolist->all();

    dump($todos->toArray());

    $todo = $todolist->get($todos->first()->id);

    dump($todo->toArray());

    $todo->fill([
        'text' => 'todo 2'
    ])->save();

    dump($todo->toArray());

    dump($todolist->all()->toArray());

    $todolist->delete($todo->id);

    dump($todolist->all()->toArray());
});
