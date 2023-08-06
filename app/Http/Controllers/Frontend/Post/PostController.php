<?php

namespace App\Http\Controllers\Frontend\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\Post\PostCreation;
use App\Models\Post\Post;
use App\Models\Post\PostImage;
use App\Models\Profile\UserProfile;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()) {
            $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
            if ($logUser) {
                $posts = Post::latest()->filter(request(['search']))->get();
                return view('discussion.index', ['posts' => $posts]);
            } else {
                return view('profile.create');
            }
        }
        else{
            $posts = Post::latest()->filter(request(['search']))->get();
            return view('discussion.index', ['posts' => $posts]);
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
        return redirect()->route('post.index');
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
