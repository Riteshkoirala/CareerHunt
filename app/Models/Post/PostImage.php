<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostImage extends Model
{
    use HasFactory;
    //this is the database handling of the postimages page
    //where we can see or allow only this column in the database can be added
    protected $fillable = [
        'name',
        'path',
        'post_id',
    ];

    // this function shows the relation between the post and post images
    public function postImages():HasOne
    {
        return $this->hasOne(Post::class,'post_id','id');
    }
}
