<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Categories\RepositoryInterface',
            'App\Repositories\Categories\CategoriesRepository'
        );
        $this->app->bind(
            'App\Repositories\Banner\BannerInterface',
            'App\Repositories\Banner\BannerRepository'
        );
        $this->app->bind(
            'App\Repositories\User\UserInterface',
            'App\Repositories\User\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Products\ProductInterface',
            'App\Repositories\Products\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Dashboard\DashboardInterface',
            'App\Repositories\Dashboard\DashboardRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
