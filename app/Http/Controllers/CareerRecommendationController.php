<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerRecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $userSkill = User::where('id',Auth::user()->id)->first();
        if($request->skills_input == null) {
            $movieTitle[] =$userSkill->userProfile->skills;
        }
        else{
            $movieTitle = $request->input('skills_input');
        }
        $pythonExecutable = '../myenv/bin/python3.10'; // Use the path to your Python executable
        $skillsString = implode(', ', $movieTitle);
        $file = '../python_scripts/recommendation.py';
        $pythonScript = "$pythonExecutable $file '$skillsString'";
        $recommendations = shell_exec($pythonScript);
        return view('dashboard.recommend',['recommendations' => $recommendations]);
    }
    public function getInfo(Request $request) {
        // Retrieve the recommendation from the request
        $recommendation = $request->input('recommendation');

        // Perform any necessary logic to get the information based on the recommendation
        $description = "";
        $averageSalary = // Get average salary based on the recommendation
        $growthPerYear = // Get growth per year based on the recommendation

            // Create an HTML response with the information
        $response = "<p>Description: $description</p>";
        $response .= "<p>Average Salary: $averageSalary</p>";
        $response .= "<p>Growth Per Year: $growthPerYear</p>";

        return $response;
    }

}
