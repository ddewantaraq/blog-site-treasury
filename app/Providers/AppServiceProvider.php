<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\User\UserRepository;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Services\User\UserService;
use App\Http\Repositories\Blog\BlogRepository;
use App\Http\Repositories\Blog\BlogRepositoryInterface;
use App\Http\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Services\UtilService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UtilService::class);
        // user
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function (Application $app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });
        // blog
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(BlogService::class, function (Application $app) {
            return new BlogService($app->make(BlogRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
