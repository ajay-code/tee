<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        if($user->sex == 'male'){
            $user->avatar = 'avatar/blue.png';
        }
        elseif ($user->sex == 'female') {
            $user->avatar = 'avatar/pink.png';
        }
        else{
            $user->avatar = 'avatar/gray.png';
        }

        $user->save();
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}