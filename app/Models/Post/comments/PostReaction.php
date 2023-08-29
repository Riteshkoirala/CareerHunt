<?php

namespace App\Models\Post\comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    use HasFactory;

    protected $fillable =[
        'reaction',
        'post_id',
        'user_id'
    ];
}
