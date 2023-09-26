<?php

namespace App\Http\Services\Post;

use App\Models\Post\Post;
use App\Models\Post\PostImage;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\VoidType;
//this class is to deal with the work of the post
class PostCreation
{
    //this function stores the post in the database
    public function PostStore($request)
    {
        // this validates the data that has been sent from the frontend
        $postData = $request->validated();

//from this i am inserting the post in the database eith all the required data
        $createPost = Post::create([
            'title'=>$postData['title'],
            'message'=>$postData['message'],
            'user_id'=>Auth::user()->id,
        ]);

        //this is to add the image in the post if the image is there
        if($request->files != null)
        {
            //then it redirect that image to this function
            $this->addUrl($request, $createPost->id);
        }
    }
    //this function is to update the post of the user
    public function PostUpdate($request, $post)
    {
        //it validates the input of the system
        $postData = $request->validated();

        //then it update the existing post
        $post->Update([
            'title'=>$postData['title'],
            'message'=>$postData['message'],
            'user_id'=>1,
        ]);

        //if there are files included then it is redirecteed here
        if($request->files != null)
        {
            //then in here we save the images
            $this->addUrl($request, $post->id);
        }
    }
    public function addUrl($request,$postId)
    {
        //this is the function to asave the image
        //the url we get is in array
        $postAttach[] = $request->files;
        //we firstly loop the array
        foreach ($postAttach as $attachment) {
//again loop the array
            foreach ($attachment as $files) {
                //and finnaly gets the file
                foreach ($files as $file){
                    //then we get the original name of it
                    $name = $file->getClientOriginalName();
                    //then seperate tit using the explade
                $ext = explode('/', $file->getClientMimeType());
                $filename = uniqid() . '.' . $ext[1];
                //the post it to this storage
                $file->move(public_path('storage/post/' . $postId . '/'), $filename);

                //thenwe add that data in this table also
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
