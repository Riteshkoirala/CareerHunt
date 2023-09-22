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
        $user = User::where('id',$id)->delete();
        $post = Post::where('user_id', $id)->delete();
        $userProfile = UserProfile::where('user_id', $id)->delete();
        $cv = Cv::where('user_id', $id)->delete();
        $postRe = PostReaction::where('user_id', $id)->delete();
        $Come= CommentReaction::where('user_id', $id)->delete();
        $asRe = AssessmentResult::where('user_id', $id)->delete();
        $c = Comments::where('user_id', $id)->delete();
        return back();
    }
}
