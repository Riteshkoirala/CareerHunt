<?php

namespace App\Http\Services\Post;

use App\Models\Post\Post;
use App\Models\Post\PostImage;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\VoidType;

class PostCreation
{
    public function PostStore($request)
    {

        $postData = $request->validated();


        $createPost = Post::create([
            'title'=>$postData['title'],
            'message'=>$postData['message'],
            'user_id'=>Auth::user()->id,
        ]);

        if($request->files != null)
        {
            $this->addUrl($request, $createPost->id);
        }
    }
    public function PostUpdate($request, $post)
    {

        $postData = $request->validated();


        $post->Update([
            'title'=>$postData['title'],
            'message'=>$postData['message'],
            'user_id'=>1,
        ]);

        if($request->files != null)
        {
            $this->addUrl($request, $post->id);
        }
    }
    public function addUrl($request,$postId)
    {

        $postAttach[] = $request->files;


        foreach ($postAttach as $attachment) {

            foreach ($attachment as $files) {
                foreach ($files as $file){

                    $name = $file->getClientOriginalName();
                $ext = explode('/', $file->getClientMimeType());
                $filename = uniqid() . '.' . $ext[1];
                $file->move(public_path('storage/post/' . $postId . '/'), $filename);

                $postAttach = PostImage::create([
                    'post_id' => $postId,
                    'name' => $name,
                    'path' => 'storage/post/' . $postId . '/' . $filename,
                ]);
            }
        }
        }
    }
}
