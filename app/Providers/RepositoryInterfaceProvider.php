<?php

namespace App\Providers;

use App\Interface\V1\FamilyInterface;
use App\Repository\V1\FamilyRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FamilyInterface::class ,FamilyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
