<?php

namespace App\Http\Controllers\User;

use App\Club;
use App\User;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PlaceController extends Controller
{

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function places()
    {
        return view('user.places.index');
    }
    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placesAll()
    {
    	$user = auth()->user();
        return $user->places;
    }

    /**
     * Show form to Add Preferred location by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPlace()
    {
        return view('user.places.add');
    }

    /**
     * Add Preferred location by the user in store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePlace(Request $request)
    {
        $this->validate($request,[
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required'
       ]);
        // Attach the club to the user
        $user = auth()->user();
        $place = $user->places()->create($request->all());
        // return $place;
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
            'place_id' => 'required'
       ]);
        // Attach the club to the user
        $user = auth()->user();
        $place = Place::find($request->place_id);
        $place->delete();
        alert()->success('you have successfully deleted the place');
        return back();
    }

}
