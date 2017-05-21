<?php
namespace App\Http\ViewComposers;

use App\User;
use Illuminate\View\View;

class ChatlistComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->users = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $onlineFriends = auth()->user()
                        ->getFriends()
                        ->where('statusOnline', '=', true);

        $view->with('onlineFriends', $onlineFriends);
    }
}