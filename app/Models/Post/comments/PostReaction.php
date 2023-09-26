<?php

namespace App\Models\Post\comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    use HasFactory;
    //this is the database handling of the post reaction page
    //where we can see or allow only this column in the database can be added
    protected $fillable =[
        'reaction',
        'post_id',
        'user_id'
    ];
}
