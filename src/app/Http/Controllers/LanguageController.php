<?php

namespace App\Http\Controllers;

Use Cookie;
use Illuminate\Http\Request;
class LanguageController extends Controller
{
    public function change(Request $request){
        Cookie::queue('lang', $request->lang , 2628000);
    	return back();
    }
}
