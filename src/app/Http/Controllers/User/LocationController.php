<?php

namespace App\Http\Controllers\User;

use App\Club;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LocationController extends Controller
{

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function locations()
    {
        return view('user.locations.index');
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
        return $user->location()->get();
    }

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addLocation()
    {
        if(auth()->user()->location()->get()->count() > 0){
            return redirect()->route('user.location.edit');
        }
        return view('user.locations.add');
    }

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editLocation()
    {
        return view('user.locations.change');
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
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required'
       ]);
        // Attach the club to the user
        $user = auth()->user();
        $location = $user->location()->create($request->all());
        // return $location;
        return redirect()->route('user.locations');
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
            'location_id' => 'required'
       ]);
        // Attach the club to the user
        $user = auth()->user();
        $location = Location::find($request->location_id);
        $location->delete();
        alert()->success('you have successfully deleted the location');
        return back();
    }

}
