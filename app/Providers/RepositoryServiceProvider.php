<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositores\Contracts\ProductRepositoryInterface::class, \App\Repositores\Eloquent\ProductRepository::class);
        $this->app->bind(\App\Repositores\Contracts\CategoryRepositoryInterface::class, \App\Repositores\Eloquent\CategoryRepository::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
