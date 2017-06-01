<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\FriendRequestAccepted;

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
        
        /*Notify the user to who send the friend request*/
        $notifiableUser = $sender;
        $notifiableUser->notify(new FriendRequestAccepted(auth()->user()));

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
    *   Return view of all friend request
    */
    public function usersFriends(User $user)
    {

        if($user->settings->can_view_friends == 'everyone'){
            $friends = $user->getFriends();
        }elseif($user->settings->can_view_friends == 'friends'){
            if($user->isFriendWith(auth()->user())){
                $friends = $user->getFriends();
            }
        }
        if(!isset($friends)){
            return redirect()->route('other.user.profile', ['user' => $user->id]);
        }
        return view('other.user.friends', compact('friends', 'user'));
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
    public function searchUsers(Request $request)
    {
        $keyword = $request->get('query');
        // dd($keyword);
        $CurrentUser = auth()->user();
        $except = $CurrentUser->getFriends()->pluck('id');
        $except[] = $CurrentUser->id;
        $users = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->get()
                ->except($CurrentUser->id); 
        return view('user.findfriends', compact('CurrentUser', 'users'));
    }



    /**
    *   Return view of all Users
    */
    public function findFriendsUsingLocation()
    {
        $CurrentUser = auth()->user();
        if(!$CurrentUser->location){
            alert()->info('Please enter your location to use people nearby');
            return redirect()->route('user.location.add');
        }
        $except = [];
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
            ->get()
            ->except($center->id);
        
        if($locations){
            // Reject the current user and his friends from the list
            $locations = $locations->reject(function($location) use($except){
                return in_array($location->user->id, $except);
            });    
        }
        
        // return $locations;
        return view('user.findfriendsbylocation', compact('locations', 'except', 'radius'));
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
