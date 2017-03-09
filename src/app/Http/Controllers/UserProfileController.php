<?php

namespace App\Http\Controllers;

use Auth;
use Cookie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;

class UserProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.editprofile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request)
    {
        // return $request->all();
        $user = Auth::user();
        $user->update($request->except('email'));

        // setting Users preferred language
        Cookie::queue('lang', $user->lang, 2628000);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        // Extracting The Image
        list($ext, $data)   = explode(';', $request->avatar);
        list(, $data)       = explode(',', $data);
        $avatar =  base64_decode($data);

        // Generating Name For File
        $avatarName = Auth::id() . str_random(10) . time() . '.png';
        $path = 'avatar/'.$avatarName;

        // Storing The File
        file_put_contents(storagePath($path), $avatar);

        // Updating User Avatar
        $user = Auth::user();
        $user->avatar = $path;
        $user->save();

        // Return Url To the Avatar
        return getStorageUrl($path);
    }

}
