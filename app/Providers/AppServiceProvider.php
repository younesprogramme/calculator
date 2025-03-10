<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Calculator\CalculatorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CalculatorService::class, function () {
            return new CalculatorService();
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
