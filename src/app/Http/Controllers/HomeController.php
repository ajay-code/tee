<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application HomePage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function chatlist()
    {
        return view('layouts.partials.chatlistitems', compact('onlineFriends'));
    }

    public function markNotificationRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
