<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
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
    	$user = auth()->user();
    	$friends = $user->getFriends();

    	return view('user.friends', compact('friends', 'user'));
    }

}
