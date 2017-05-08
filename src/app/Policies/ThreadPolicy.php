<?php

namespace App\Policies;

use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the thread.
     *
     * @param  \App\User  $user
     * @param  \App\Cmgmyr\Messenger\Models\Thread  $thread
     * @return mixed
     */
    public function view(User $user, Thread $thread)
    {
        if(!$thread->hasParticipant($user->id)){
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can create threads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the thread.
     *
     * @param  \App\User  $user
     * @param  \App\Cmgmyr\Messenger\Models\Thread  $thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
        if(!$thread->hasParticipant($user->id)){
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can delete the thread.
     *
     * @param  \App\User  $user
     * @param  \App\Cmgmyr\Messenger\Models\Thread  $thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        if(!$thread->hasParticipant($user->id)){
            return false;
        }
        return true;
    }
}
