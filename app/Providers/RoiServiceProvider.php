<?php

namespace App\Providers;

use App\Services\RoiService;
use App\Services\Impl\RoiServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class RoiServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        RoiService::class => RoiServiceImpl::class
    ];

    public function provides(): array
    {
        return [RoiService::class];
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
