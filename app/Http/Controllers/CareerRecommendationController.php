<?php

namespace App\Http\Controllers;

use App\Models\Profile\UserProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerRecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        //from this we are checking if the user has the userprofile created or not
        $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
        //if create it will show the  page not then it will show the user proifle complete page
        if ($logUser) {
            // we are getting the  after the search filter is applied
            // now here we look for the user skills int the user dkill tabel a
            $userSkill = User::where('id', Auth::user()->id)->first();
            //if it is there then we set the skill_input to that
                if ($request->skills_input == null) {
                    $skill[] = $userSkill->userProfile->skills;
                } else {
                    //else the input that we got from the input fileld
                    $skill = $request->input('skills_input');
                }
                //this is the pythin script file to run it
                $pythonExecutable = '../myenv/bin/python3.10'; // Use the path to your Python executable
            //this wll seperate the skills
                $skillsString = implode(', ', $skill);
                //this is the script file
                $file = '../python_scripts/recommendation.py';
                //this will run the script file in the front
                $pythonScript = "$pythonExecutable $file '$skillsString'";
                //this will run the pyhton script in the terminal
                $recommendations = shell_exec($pythonScript);
                //this is the recommendaed job view page
                return view('dashboard.recommend', ['recommendations' => $recommendations]);
            }else{
            //if no user profile we will be redirected to this
                return view('profile.create');
            }

    }


}
