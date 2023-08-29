<?php

namespace App\Models\Post\comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReaction extends Model
{
    use HasFactory;

    protected $fillable =[
        'reaction',
        'comment_id',
        'user_id'
    ];
}
