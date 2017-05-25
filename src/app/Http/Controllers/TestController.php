<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return  Post::with('likesCounter')->get();
                      
    }
}
