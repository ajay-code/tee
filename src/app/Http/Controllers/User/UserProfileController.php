<?php

namespace App\Http\Controllers\User;

use Auth;
use Image;
use Cookie;
use App\Club;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;

class UserProfileController extends Controller
{

    public function __construct(){
        // user needs to be logged in to use these functionalities
        $this->middleware('auth');
    }
    /**
     * Display a listing of user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Display a listing of user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function information()
    {
        $user = Auth::user();
        return view('user.profileInfo', compact('user'));
    }


    /**
     * Show the form for editing the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.editprofile', compact('user'));
    }

    /**
     * Update the user profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request)
    {
        // update the profile of current user
        $user = Auth::user();
        $user->update($request->except('email'));
        //Set users locale in a ciikie 
        Cookie::queue('lang', $user->lang, 2628000);
        // Return Back to the page
        return back();
    }

    /**
     * Update the user avatar in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Url path
     */
    public function updateAvatar(Request $request)
    {
        // Creating The Image
        $avatar = Image::make($request->avatar)->fit(300);
        $avatarThumbnail = Image::make($request->avatar)->fit(40);

        // Generating Name For File
        $avatarName = Auth::id() . str_random(10) . time() . '.png';
        $path = 'avatar/'.$avatarName;
        $thumbnailPath = 'avatar/'.'tn-'.$avatarName;

        // Storing The File
        $avatar->save(storagePath($path), 60);
        $avatarThumbnail->save(storagePath($thumbnailPath), 60);

        // Updating User Avatar
        $user = Auth::user();
        $user->avatar = $avatarName;
        $user->save();

        // Return Url Of the Avatar
        return 'success';
    }

    /**
     * Update the terms accepted field of user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function termsAccepted(Request $request)
    {
        // update Terms accepted field to true if user has accepted them
        if($request->has('terms_accepted')){
            if($request->terms_accepted == true){
                Auth::user()->update([
                    'terms_accepted' => true
                ]);
            }
        }
        // Return back to the page
        return back();
    }

    

}
