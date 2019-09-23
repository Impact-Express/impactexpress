<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('ifCustomer', function() {
            return "<?php if (!auth()->user()->isAdmin()): ?>";
        });

        \Blade::directive('ifAdmin', function() {
            return "<?php if (auth()->user()->isAdmin()): ?>";
        });
    }
}
