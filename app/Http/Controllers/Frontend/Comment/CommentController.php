<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Post\comments\Comments;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validate = $request->validated();
        $create_comment = Comments::create($validate);

        return back();
    }
}
