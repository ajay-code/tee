<?php

namespace App\Http\Controllers;

use Hash;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return Hash::make('123456');
    }

    
}
