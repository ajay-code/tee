<?php

namespace App\Listeners;

use Auth;
use Alert;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
        if($event->user){
            $event->user->update(['loggedin' => true]);
        }
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {
        if($event->user){
            $event->user->update(['loggedin' => false]);
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}