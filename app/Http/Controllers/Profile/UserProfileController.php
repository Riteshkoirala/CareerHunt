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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logUser = UserProfile::where('user_id',Auth::user()->id)->first();
        if ($logUser) {
            $profile = UserProfile::where('user_id', Auth::user()->id)->first();
            return view('profile.index', ['profile'=> $profile]);
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
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserProfileStoreRequest $request, profileCreation $profileCreation)
    {
        $profileCreation->profileStore($request);
        return redirect()->route('Home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = UserProfile::where('user_id', Auth::user()->id)->first();
        return view('profile.edit', ['profile'=> $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileStoreRequest $request,UserProfile $profile, profileCreation $profileCreation)
    {
        $profileCreation->profileUpdate($request, $profile);
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
