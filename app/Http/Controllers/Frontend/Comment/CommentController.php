<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Post\comments\Comments;
//this conteoller is to store the comment of the user
class CommentController extends Controller
{
    //this functionalit is for saving the comment of the user
    public function store(CommentRequest $request)
    {
        //through this first we validate the user
        $validate = $request->validated();
        //then we send the comment to the database
        $create_comment = Comments::create($validate);
        //and then is redirected back to the page we came form.
        return back();
    }
}
