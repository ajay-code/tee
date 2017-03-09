<?php

namespace App;

Use Carbon\Carbon;
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
        'username', 'email', 'password','firstname', 'lastname', 'sex', 'phone_number', 'dob', 'handicap', 'verified', 'lang'
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

    public function getAgeAttribute(){

        return $this->dob ? $this->dob->diff(Carbon::now()) : false ;
    }



    /*** RelationShips ***/
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

}
