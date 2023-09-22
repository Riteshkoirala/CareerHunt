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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
        if ($logUser) {
            $posts = Post::latest()->filter(request(['search']))->get();
            $mostLiked = Post::withCount(['UserReaction as LikeCount' => function ($query) {
                $query->where('reaction', 1);
            }])
                ->orderByDesc('LikeCount')
                ->take(3)
                ->get();
//        dd($mostLiked->title);
            $user = User::where('id', Auth::user()->id)->first();
            $users = User::orderBy('id')->skip(1)->take(PHP_INT_MAX)->get();
            $ownPosts = Post::where('user_id', Auth::user()->id)->latest()->get();
            return view('discussion.index', compact('posts', 'user', 'mostLiked', 'users', 'ownPosts'));
        }
        else{
            return view('profile.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, PostCreation $postStore)
    {
        $postStore->PostStore($request);
        session()->flash('successAlert', 'Successfully Post has been added.');
        return redirect()->route('post.index');
;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post, PostCreation $postStore)
    {
        $postStore->PostUpdate($request, $post);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function attachmentDestroy($id)
    {
        $postAtt = PostImage::where('id', $id)->delete();
        return redirect()->route('post.index');
    }
}
