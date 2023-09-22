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
            $logUser = UserProfile::where('user_id', Auth::user()->id)->first();
            if ($logUser) {
                $userSkill = User::where('id', Auth::user()->id)->first();
                if ($request->skills_input == null) {
                    $skill[] = $userSkill->userProfile->skills;
                } else {
                    $skill = $request->input('skills_input');
                }
                $pythonExecutable = '../myenv/bin/python3.10'; // Use the path to your Python executable
                $skillsString = implode(', ', $skill);
                $file = '../python_scripts/recommendation.py';
                $pythonScript = "$pythonExecutable $file '$skillsString'";
                $recommendations = shell_exec($pythonScript);
                return view('dashboard.recommend', ['recommendations' => $recommendations]);
            }else{
                return view('profile.create');
            }

    }


}
