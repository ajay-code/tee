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

        // Assign a profile Image
        if($user->sex == 'male'){
            $user->avatar = 'blue.png';
        }
        elseif ($user->sex == 'female') {
            $user->avatar = 'pink.png';
        }
        else{
            $user->avatar = 'gray.png';
        }

        // Assign Name
        if($user->lastname !== null){
            $user->name = $user->firstname . ' ' . $user->lastname;
        }else{
            $user->name = $user->firstname;
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