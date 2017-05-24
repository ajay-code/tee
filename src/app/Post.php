<?php

namespace App;


use Cog\Likeable\Traits\HasLikes;
use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\HasComments;
use Cog\Likeable\Contracts\HasLikes as HasLikesContract;
class Post extends Model implements HasLikesContract
{
    use HasLikes, HasComments;

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
    protected $fillable = ['body', 'user_id', 'image'];

    /**
     * The attributes that should be Added for arrays.
     *
     * @var array
     */
    protected $appends = ['likedByCurrentUser'];

    public function getLikedByCurrentUserAttribute()
    {
        return $this->liked;
    }

    public function imageUrl()
    {
        return getStorageUrl($this->image);
    }
    /* Relationships */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
