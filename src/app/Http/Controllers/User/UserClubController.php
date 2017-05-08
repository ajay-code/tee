<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserClubController extends Controller
{

    public function __construct(){
        // user needs to be logged in to use these functionalities
        $this->middleware('auth');
    }
    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function locations()
    {
        return view('user.clubs.index');
    }
    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function locationsAll()
    {
    	$user = auth()->user();
        return $user->clubs;
    }

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addLocation()
    {
        return view('user.clubs.add');
    }

    /**
     * Add Preferred location by the user in store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLocation(Request $request)
    {
        $this->validate($request,[
            'club_id' => 'required'
       ]);
        // Attach the club to the user
        $user = auth()->user();
        $club = Club::find($request->club_id);
        if($user->clubs->contains($club)){
            alert()->info('This place is already added to your preferred location');
            return back();
        }
        $user->clubs()->attach($club);
        alert()->success('successfully added to your preferred location');
        return back();
    }

    /**
     * Delete Preferred location by the user in store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request,[
            'club_id' => 'required'
       ]);
        $club = Club::find($request->club_id);
        // Detach the club to the user
        $user = auth()->user();
        $user->clubs()->detach($club);
        alert()->success('successfully Deleted from your preferred location');

        return back();
    }

}
