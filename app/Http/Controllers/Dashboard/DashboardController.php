<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()) {
            $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
            if ($logUser) {
                return view('dashboard.dashboard');
            }
            else{
                return view('profile.create');
            }
        }
        else{
            return view('dashboard.dashboard');
        }

    }
}
