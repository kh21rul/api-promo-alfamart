<?php

namespace App\Providers;

use App\Services\RoishopService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\RoishopServiceImpl;

class RoishopServiceProvider extends ServiceProvider
{
    public array $singletons = [
        RoishopService::class => RoishopServiceImpl::class
    ];

    public function provides(): array
    {
        return [RoishopService::class];
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
