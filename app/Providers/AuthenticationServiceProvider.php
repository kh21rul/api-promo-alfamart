<?php

namespace App\Providers;

use App\Services\AuthenticationService;
use App\Services\Impl\AuthenticationServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class AuthenticationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AuthenticationService::class => AuthenticationServiceImpl::class
    ];

    public function provides(): array
    {
        return [AuthenticationService::class];
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
