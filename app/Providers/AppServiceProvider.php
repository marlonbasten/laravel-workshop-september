<?php

namespace App\Providers;

use App\ApiHelper\ResponseHelper;
use App\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;
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
        \App::bind('responseHelper', function () {
            return new ResponseHelper();
        });
        \App::bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
