<?php

namespace App;


use Cog\Likeable\Traits\HasLikes;
use Illuminate\Database\Eloquent\Model;
use Cog\Likeable\Contracts\HasLikes as HasLikesContract;
class Post extends Model implements HasLikesContract
{
    use HasLikes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id'];

    /* Relationships */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
