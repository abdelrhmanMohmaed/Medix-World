<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Major;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::defaultView('web.partials.pagination');

        view()->composer('*', function ($view) {

            $view->with('allMajors',  Major::active()->get());
            $view->with('allCities',  City::active()->get());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
