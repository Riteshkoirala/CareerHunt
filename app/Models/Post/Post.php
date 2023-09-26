<?php

namespace App\Models\Post;

use App\Models\Post\comments\Comments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    //this is the database handling of the post page
    //where we can see or allow only this column in the database can be added
    protected $fillable = [
        'title',
        'message',
        'user_id',
        'updated_at',
    ];

    public function scopeFilter($query, array $filters)
    {
        //this is to apply filter in the front
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('message', 'like', '%' . request('search') . '%');
        }
    }
    //this is to the  relation post and postimages table
    public function postImages():HasMany
    {
        return $this->hasMany(PostImage::class,'post_id','id');
    }
    //this is to the  relation post and post comment table
    public function postComment():HasMany
    {
        return $this->hasMany(Comments::class,'post_id', 'id');
    }
    //this is to the  relation post and user table
    public function user():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    //this is to the  relation post and raction to the post table

    public function UserReaction():BelongsToMany
    {
        return $this->belongsToMany(User::class,'post_reactions','post_id','user_id');
    }
}
