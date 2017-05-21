<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
                'posts.partials.chatlist', 'App\Http\ViewComposers\ChatlistComposer'
        );
        View::composer(
                'layouts.partials.chatlistitems', 'App\Http\ViewComposers\ChatlistComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
