<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

     /*** RelationShips ***/
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
