<?php

namespace App\Http\Services;

use App\Models\Profile\UserProfile;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    public function check(){
        if (Auth::user()) {
            $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
            if ($logUser) {
                return true;
            }
            else{
                return view('profile.create');
            }
        }
    }

}
