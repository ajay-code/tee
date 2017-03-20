<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $guarded = ['id'];


      /*** RelationShips ***/
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
