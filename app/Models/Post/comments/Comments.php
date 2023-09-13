<?php

namespace App\Models\Post\comments;

use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
      'message',
      'post_id',
      'user_id'
    ];

    public function postComment():HasOne
    {
        return $this->hasOne(Post::class,'id', 'post_id');
    }
    public function userComment():HasOne
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
