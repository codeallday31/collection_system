<?php

namespace App\Providers;

use App\Billing;
use App\Observers\BillingObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {        
        Billing::observe(BillingObserver::class);
    }
}
