<?php

namespace App\Providers;

use App\Services\DataujiService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\DataujiServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;

class DataujiServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        DataujiService::class => DataujiServiceImpl::class
    ];

    public function provides(): array
    {
        return [DataujiService::class];
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
