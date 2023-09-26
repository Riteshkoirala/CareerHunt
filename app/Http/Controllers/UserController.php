<?php

namespace App\Http\Controllers;

use App\Models\Assessment\AssessmentResult;
use App\Models\Cv\Cv;
use App\Models\Post\comments\CommentReaction;
use App\Models\Post\comments\Comments;
use App\Models\Post\comments\PostReaction;
use App\Models\Post\Post;
use App\Models\Profile\UserProfile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser($id)
    {
        //here we are deleting the user
        $user = User::where('id',$id)->delete();
        //here we are deleting the post
        $post = Post::where('user_id', $id)->delete();
        //here we are deleting the userProfile
        $userProfile = UserProfile::where('user_id', $id)->delete();
        //here we are deleting the cv
        $cv = Cv::where('user_id', $id)->delete();
        //here we are deleting the post reaction
        $postRe = PostReaction::where('user_id', $id)->delete();
        //here we are deleting the comment reaction
        $Come= CommentReaction::where('user_id', $id)->delete();
        //here we are deleting the comment assessemnt result
        $asRe = AssessmentResult::where('user_id', $id)->delete();
        //here we are deleting the comment
        $c = Comments::where('user_id', $id)->delete();
        //then we are redirecting tot the page where this came from
        return back();
    }
}
