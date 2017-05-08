<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = ['id'];

     /*** RelationShips ***/
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
