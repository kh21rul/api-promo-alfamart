<?php

namespace App\Providers;

use App\Services\DatasetService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\DatasetServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;

class DatasetServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        DatasetService::class => DatasetServiceImpl::class
    ];

    public function provides(): array
    {
        return [DatasetService::class];
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
