<?php

namespace App\Http\Controllers\Frontend\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\LoginCheck;
use App\Http\Services\Post\PostCreation;
use App\Models\Post\Post;
use App\Models\Post\PostImage;
use App\Models\Profile\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
//this controller is for the post and discussion forum that i have in the frontend
class PostController extends Controller
{
    //this function shows all the post data to the post view in the frontend
    public function index()
    {
        //from this we are checking if the user has the userprofile created or not
        $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
        //if create it will show the post page not then it will show the user proifle complete page
        if ($logUser) {
            // we are getting the post after the search filter is applied
            $posts = Post::latest()->filter(request(['search']))->get();
            //this is to take out the user with the most likes
            $mostLiked = Post::withCount(['UserReaction as LikeCount' => function ($query) {
                $query->where('reaction', 1);
            }])
                ->orderByDesc('LikeCount')
                ->take(3)
                ->get();
            //this is for gettinf the data of the logged in user
            $user = User::where('id', Auth::user()->id)->first();
            //this is for taking th =e data of all the user but skipping the first since i am the first one
            $users = User::orderBy('id')->skip(1)->take(PHP_INT_MAX)->get();
            //getting the post of the user which has been done by himself
            $ownPosts = Post::where('user_id', Auth::user()->id)->latest()->get();
            //this is the view where we are showing all the data and then the user can access allt he things
            return view('discussion.index', compact('posts', 'user', 'mostLiked', 'users', 'ownPosts'));
        }
        else{
            //this is for if the user doesnot have the user profile
            return view('profile.create');
        }
    }
//this function is to store the post in the database
    public function store(StorePostRequest $request, PostCreation $postStore)
    {
        //here i ahve sent all the data to the post creating dunction to make the post successful
        $postStore->PostStore($request);
        //this is to flash the successful message
        session()->flash('successAlert', 'Successfully Post has been added.');
        //after the post has been successful we are redirecting agin to the post index page
        return redirect()->route('post.index');
    }

   //from this function we are updating the post of the specified post
    public function update(StorePostRequest $request, Post $post, PostCreation $postStore)
    {
        //we are using this function ot update the post by passing the value like post and rewuest data
        $postStore->PostUpdate($request, $post);
        //then after successful we are redirecting it to the post index page
        return redirect()->route('post.index');
    }

   //this is to delete the post
    public function destroy(Post $post)
    {
        // through this we are deleting the post that has been sent
        $post->delete();
        //then again redirecting to the index page where we see all the data
        return redirect()->route('post.index');
    }
//this is to destroy tht attachment of the post
    public function attachmentDestroy($id)
    {
        //first we are taking the post in the post image the we are deleting it
        $postAtt = PostImage::where('id', $id)->delete();
        // and then redirecting it to the database
        return redirect()->route('post.index');
    }
}
