<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
       'created_at',
       'updated_at',
       'dob'
   ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','firstname', 'lastname', 'sex', 'phone_number', 'dob', 'handicap', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /*** RelationShips ***/
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

}
