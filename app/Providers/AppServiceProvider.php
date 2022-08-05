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
            'App\Repositories\Admin\Categories\RepositoryInterface',
            'App\Repositories\Admin\Categories\CategoriesRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Banner\BannerInterface',
            'App\Repositories\Admin\Banner\BannerRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\User\UserInterface',
            'App\Repositories\Admin\User\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Products\ProductInterface',
            'App\Repositories\Admin\Products\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Dashboard\DashboardInterface',
            'App\Repositories\Admin\Dashboard\DashboardRepository'
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
