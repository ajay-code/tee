<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class OtherUserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
    * @param User
    * @return view
    */
    public function find($user)
    {
    	$user = User::find($user);
    	if(!$user){
    		alert()->info('user you are looking for is not found');
    		return redirect()->route('home');
    	}

    	if($user->id == auth()->user()->id){
    		return redirect()->route('user.profile');
    	}

        $posts = $user->posts()->with('user','comments.creator')->latest()->get();
        // return $posts;
    	return view('other.user.profile', compact('user', 'posts'));
    }

    /**
    *
    *
    */
    public function sendFriendRequest($recipient)
    {
    	$recipient = User::find($recipient);
    	$user = auth()->user();
    	$user->befriend($recipient);
    	return back();
    }

}
