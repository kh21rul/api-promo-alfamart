<?php

namespace App\Providers;

use App\Services\ConsumerService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\ConsumerServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;

class ConsumerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ConsumerService::class => ConsumerServiceImpl::class
    ];

    public function provides(): array
    {
        return [ConsumerService::class];
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
