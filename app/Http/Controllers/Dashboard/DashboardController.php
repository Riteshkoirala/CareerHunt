<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//this page is to show the home page of the system bit while logged in or logged out
class DashboardController extends Controller
{
    //this function redirect us to the desired home page
    public function index(){
        //firstly it chceck if the user is logged in or not
        if (Auth::user()) {
            //if the user is logged in then it takes the data and then
            $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
            //it conforms the data and then redirect the user
            if ($logUser) {
                //to  the home page after login
                return view('dashboard.home');
            }
            else{
                //if the user is logged in but does not have a user profile then it redirect to the
                //profile create page
                return view('profile.create');
            }
        }
        else{
            //this is for if the user is just a visitor
            return view('dashboard.home');
        }

    }
    public function recommend(){
        //it displays the recommend dashboard
        return view('dashboard.recommend');
    }
}
