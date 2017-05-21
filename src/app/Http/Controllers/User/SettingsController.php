<?php

namespace App\Http\Controllers\User;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
    	
    }

    public function online()
    {
    	auth()->user()->update(['online' => true]);
		return 'success';    	
    }

    public function offline()
    {
    	auth()->user()->update(['online' => false]);
		return 'success';    	
    }

    public function updateLastActivity()
    {
        auth()->user()->update(['last_activity' => Carbon::now()]);
        return auth()->user();
    }
}
