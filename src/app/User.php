<?php

namespace App;

use App\Club;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Friendable;


    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
       'created_at',
       'updated_at',
       'dob',
   ];

   /**
    * The attributes that should be casted to native types.
    *
    * @var array
    */
   protected $casts = [
       'terms_accepted' => 'boolean',
       'verified' => 'boolean',
   ];

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = new Carbon($value);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','firstname', 'lastname', 'sex', 'phone_number', 'dob', 'handicap', 'verified', 'lang','terms_accepted'
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
    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return $this->dob ? $this->dob->diff(Carbon::now()) : false ;
    }

    public function avatar()
    {
        return getStorageUrl('avatar/'.$this->avatar);
    }

    public function thumbnail()
    {
        return getStorageUrl('avatar/'. 'tn-' .$this->avatar);
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
}
