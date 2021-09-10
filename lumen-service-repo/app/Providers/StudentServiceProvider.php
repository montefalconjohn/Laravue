<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Students\StudentService;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Students\StudentServiceInterface', StudentService::class);
    }
}
