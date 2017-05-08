<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function addingName()
    {
    	$users = User::all();

    	foreach ($users as $user) {
    		if($user->lastname !== null){
    			$user->name = $user->firstname . ' ' . $user->lastname;
    			// dd($user);
    		}else{
    			$user->name = $user->firstname;
    		}
    		$user->save(); 
    	}
    	return $users;
    }
}
