<?php

namespace Keeper\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Keeper\Repositories\CategoryRepositoryInterface',
            'Keeper\Repositories\Eloquent\CategoryRepository'
        );

        $this->app->bind(
            'Keeper\Repositories\PayeeRepositoryInterface',
            'Keeper\Repositories\Eloquent\PayeeRepository'
        );

        $this->app->bind(
            'Keeper\Repositories\PayerRepositoryInterface',
            'Keeper\Repositories\Eloquent\PayerRepository'
        );

        $this->app->bind(
            'Keeper\Repositories\PaymentRepositoryInterface',
            'Keeper\Repositories\Eloquent\PaymentRepository'
        );
    }
}