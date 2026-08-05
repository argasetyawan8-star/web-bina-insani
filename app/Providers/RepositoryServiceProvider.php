<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*
|--------------------------------------------------------------------------
| Interfaces
|--------------------------------------------------------------------------
*/

use App\Interfaces\RegistrationRepositoryInterface;

/*
|--------------------------------------------------------------------------
| Repositories
|--------------------------------------------------------------------------
*/

use App\Repositories\RegistrationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            RegistrationRepositoryInterface::class,
            RegistrationRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}