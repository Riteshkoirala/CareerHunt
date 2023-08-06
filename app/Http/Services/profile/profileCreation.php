<?php

namespace App\Http\Services\profile;


use App\Models\Profile\UserProfile;
use Illuminate\Support\Facades\Auth;

class profileCreation
{

    public function profileStore( $request)
    {
        $profileData = $request->validated();

        if ($request->file('cv')) {
            $cvName = $this->checkCv($request);
            $profileData['cv_path'] = 'storage/cv/'.Auth::user()->id.'/'.$cvName;
        }
        if ($request->file('image')) {
            $imageName = $this->checkPhoto($request);
            $profileData['image_name'] = $imageName;
            $profileData['image_path'] = 'storage/user/'.Auth::user()->id.'/'.$imageName;
        }

        $profileData['user_id'] = Auth::user()->id;

        $seeker = UserProfile::create($profileData);
    }
    public function checkPhoto($request){
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename = now().$filename;
        $file->move(public_path('storage/user/'.Auth::user()->id.'/'), $filename);

        return $filename;
    }

    public function checkCv($request){
        $file = $request->file('cv');
        $filename = $file->getClientOriginalName();
        $filename = now().$filename;
        $file->move(public_path('storage/cv/'.Auth::user()->id.'/'), $filename);
        return $filename;
    }

    public function profileUpdate($request, $userProfile){
        $profileData = $request->validated();

        if ($request->hasFile('cv')) {
            $cvName = $this->checkCv($request);
            $profileData['cv_path'] = 'storage/cv/'.Auth::user()->id.'/'.$cvName;
        }
        if ($request->hasFile('image')) {
            $imageName = $this->checkPhoto($request);
            $profileData['image_name'] = $imageName;
            $profileData['image_path'] = 'storage/user/'.Auth::user()->id.'/'.$imageName;
        }

        $userProfile->update($profileData);
//        $userProfile->user->update([
//            'email'=>$request->email,
//        ]);
    }

}
