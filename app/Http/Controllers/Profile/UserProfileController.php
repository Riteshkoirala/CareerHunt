<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserProfileStoreRequest;
use App\Http\Requests\Profile\UserProfileUpdateRequest;
use App\Http\Services\profile\profileCreation;
use App\Models\Post\Post;
use App\Models\Post\PostImage;
use App\Models\Profile\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function index()
    {
        //to check if the user has created the profile or not
        $logUser = UserProfile::where('user_id',Auth::user()->id)->first();
        if ($logUser) {
            //if yes then redirected to the profile page
            $profile = UserProfile::where('user_id', Auth::user()->id)->first();
            return view('profile.index', ['profile'=> $profile]);
        }
        //if not then to the profile create page
        else{
            return view('profile.create');
        }
    }


    public function create()
    {
        //profile creating page
        return view('profile.create');
    }


    public function store(UserProfileStoreRequest $request, profileCreation $profileCreation)
    {
        //this helps to create the profile
        $profileCreation->profileStore($request);
        return redirect()->route('Home');
    }



    public function edit(string $id)
    {
        //this helps to edit the profile
        $profile = UserProfile::where('user_id', Auth::user()->id)->first();
        return view('profile.edit', ['profile'=> $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileStoreRequest $request,UserProfile $profile, profileCreation $profileCreation)
    {
        //this is the profile update function
        $profileCreation->profileUpdate($request, $profile);
        return redirect()->route('profile.index');
    }


}
