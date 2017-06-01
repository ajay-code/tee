<?php

namespace App;

use Carbon\Carbon;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Notifications\Notifiable;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Friendable, Messagable;


    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
       'created_at',
       'updated_at',
       'dob',
       'last_activity'
   ];

   /**
    * The attributes that should be casted to native types.
    *
    * @var array
    */
   protected $casts = [
       'terms_accepted' => 'boolean',
       'verified' => 'boolean',
       'loggedin' => 'boolean',
       'online' => 'boolean'
   ];

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = new Carbon($value);
    }

    public function setLastActivityAttribute($value)
    {
        $this->attributes['last_activity'] = new Carbon($value);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','firstname', 'lastname', 'sex', 'phone_number', 'dob', 'handicap', 'verified', 'lang','terms_accepted', 'online', 'last_activity', 'loggedin', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be Added for arrays.
     *
     * @var array
     */
    protected $appends = ['age', 'statusOnline'];

    public function getAgeAttribute()
    {
        return $this->dob ? $this->dob->diff(Carbon::now()) : false ;
    }

    public function getStatusOnlineAttribute()
    {
        return  is_null($this->last_activity) ? false :($this->last_activity->diffInMinutes(Carbon::now()) < 3 && $this->online && $this->loggedin)  ;
    }

    public function avatar()
    {
        return getStorageUrl('avatar/'.$this->avatar);
    }

    public function thumbnail()
    {
        return getStorageUrl('avatar/'. 'tn-' .$this->avatar);
    }

    public function cs()
    {
        $this->settings()->firstOrCreate([]);
    }



    /*** RelationShips ***/
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class);
    }
    public function places()
    {
        return $this->hasMany(Place::class);
    }
    public function settings()
    {
        return $this->hasOne(Setting::class);
    }
}
