<?php

namespace App\Providers;

use App\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;
use Recca0120\Todolist\Contracts\TodoRepository as TodoRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TodoRepositoryInterface::class, TodoRepository::class);
    }
}
