<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\ProcessPodcast;
use App\Services\AudioProcessor;

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
        //
    }
}
