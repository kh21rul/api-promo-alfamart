<?php

namespace App\Providers;

use App\Services\AuthenticationService;
use App\Services\DatasetService;
use App\Services\Impl\AuthenticationServiceImpl;
use App\Services\Impl\DatasetServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class AuthenticationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AuthenticationService::class => AuthenticationServiceImpl::class,
        DatasetService::class => DatasetServiceImpl::class
    ];

    public function provides(): array
    {
        return [
            AuthenticationService::class,
            DatasetService::class,
        ];
    }

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
        //
    }
}
