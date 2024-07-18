<?php

namespace App\Providers;

use App\Services\ShopService;
use App\Services\Impl\ShopServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class ShopServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ShopService::class => ShopServiceImpl::class
    ];

    public function provides(): array
    {
        return [ShopService::class];
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
