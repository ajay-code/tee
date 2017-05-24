<?php

namespace App\Providers;

use App\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        if(!env('APP_ENV') == 'local'){
            URL::forceSchema('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
           $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
           $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
           $this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
        }
    }
}
