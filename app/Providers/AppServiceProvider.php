<?php

namespace App\Providers;

use App\Exceptions\ApiHandler;
use App\Http\Responses\ApiResponder;
use App\Http\Responses\ResponsesInterface;
use Illuminate\Contracts\Debug\ExceptionHandler;
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
        // Use the ApiResponder as the concrete implementation for the ResponsesInterface
        $this->app->bind(ResponsesInterface::class, ApiResponder::class);

        // Use the ApiHandler as the main exception handler
        $this->app->singleton(ExceptionHandler::class, ApiHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
