<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // user needs to be logged in to use these functionalities
        $this->middleware('auth');
    }
    /**
    *	Return view of all friend request
    */
    public function showFriendRequests()
    {
    	$user = auth()->user();
    	$friendRequests = $user->getFriendRequests()->load('sender');
    	return view('user.friendrequests', compact('friendRequests', 'user'));
    }

    /**
    *	Accept Friend Request From sender
    */
    public function acceptFriendRequests($sender)
    {
    	$user = auth()->user();
    	$sender = User::find($sender);
    	$user->acceptFriendRequest($sender);
    	return back();
    }

    /**
    *	Return view of all friend request
    */
    public function showFriendList()
    {
    	$friends = auth()->user()->getFriends();
    	return view('user.friends', compact('friends'));
    }

    /**
    *   Return view of all Users
    */
    public function findFriends()
    {
        $CurrentUser = auth()->user();
        $except = $CurrentUser->getFriends()->pluck('id');
        $except[] = $CurrentUser->id;
        $users = User::all()->except($CurrentUser->id); 
        return view('user.findfriends', compact('CurrentUser', 'users'));
    }

    /**
    *   Return view of all Users
    */
    public function findFriendsUsingLocstion()
    {
        $CurrentUser = auth()->user();
        $except = $CurrentUser->getFriends()->pluck('id')->toArray();
        $except[] = $CurrentUser->id;
        $center = $CurrentUser->location;
        $radius = 1000;
        
        // Select All the location with in the location of current user
        $locations =  Location::select(
                DB::raw("id, user_id, lat, lng, ( 
                        3959 * acos( 
                            cos( radians(  ?  ) ) *
                            cos( radians( lat ) ) * 
                            cos( radians( lng ) - radians(?) ) + 
                            sin( radians(  ?  ) ) *
                            sin( radians( lat ) ) 
                        )
                   ) AS distance")
            )
            ->having("distance", "<", "?")
            ->orderBy("distance")
            ->with('user')
            ->take(20)
            ->setBindings([$center->lat, $center->lng, $center->lat,  $radius])
            ->get();
            // ->except($center->id);

        // Reject the current user and his friends from the list
        $locations = $locations->reject(function($location) use($except){
            // return in_array($location->user->id, $except);
        });
        // return $locations;
        return view('user.findfriendsbylocation', compact('locations', 'except'));
    }

    /**
    *   unfriend the given User 
    */
    public function unfriend(User $user)
    {
        auth()->user()->unfriend($user);
        return back();
    }

}
