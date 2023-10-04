<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

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

        Blade::anonymousComponentPath(resource_path('views/layouts'), 'layout');

        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));

        Relation::enforceMorphMap([
            1 => User::class,
        ]);
    }
}
