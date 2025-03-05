<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\City;
use App\Models\Duration;
use App\Models\Extra;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Schema::defaultStringLength(191);
        Model::shouldBeStrict();

        Blade::anonymousComponentPath(resource_path('views/layouts'), 'layout');

        Vite::macro('image', fn(string $asset) => $this->asset("resources/images/{$asset}"));

        // Cashier::calculateTaxes();

        Relation::enforceMorphMap([
            1 => User::class,
            2 => Service::class,
            3 => City::class,
            4 => Extra::class,
            5 => Duration::class,
            6 => Booking::class,
        ]);
    }
}
