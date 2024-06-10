<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Services\User\UserService;
use App\Http\Services\User\UserServiceInterface;
use App\Http\Services\UserService\UserService as UserServiceUserService;
use App\Http\Services\UserService\UserServiceInterface as UserServiceUserServiceInterface;
use Illuminate\Support\ServiceProvider;


class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }
}