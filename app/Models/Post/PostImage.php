<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'post_id',
    ];

    public function postImages():HasOne
    {
        return $this->hasOne(Post::class,'post_id','id');
    }
}
