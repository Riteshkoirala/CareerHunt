<?php

namespace App\Models\Post\comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReaction extends Model
{
    use HasFactory;
    //this is the database handling of the commentreaction page
    //where we can see or allow only this column in the database can be added
    protected $fillable =[
        'reaction',
        'comment_id',
        'user_id'
    ];
}
