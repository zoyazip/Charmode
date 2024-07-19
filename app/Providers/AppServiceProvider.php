<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\CategoryComposer;


class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        URL::forceScheme(scheme:'https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('web.layout.header', CategoryComposer::class);
    }
}
