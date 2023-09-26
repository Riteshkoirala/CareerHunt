<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Services\Assessment\AnswerEntry;
use App\Models\Assessment\Assessment;
use App\Models\Assessment\AssessmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//this controller is for the assessment section of the project
class AssessmentController extends Controller
{
    //this function shows the asssesment in the view page by passing the required data
    public function index()
    {
        //this is to select the total assessment which have the same tag
        $assessments = DB::table('assessments')
            //this is selecting and counting
            ->select('tag', DB::raw('COUNT(*) as count'))
            ->groupBy('tag')//this is grouping by using the tag
            ->get();
        //this is checking whether the user have given the test before or not if have then it will display the result
        $resultCheck = AssessmentResult::where('user_id',Auth::user()->id)->first();
        //thi is to get the previous result of the assignment done by the user
        $trash = AssessmentResult::onlyTrashed()->where('user_id',Auth::user()->id)->latest()->first();
        //thi is to return the user to the view file with the variable needed to add in the file
        return view('assessment.index',compact('assessments','resultCheck','trash'));
    }

    //thi function is to get the easy level of the exam in the front-end
    public function easy($tag)
    {
        //this is to take the five question out of q0 question in the front end so that the
        //user gets the random question
        $easy = Assessment::where('label', 'easy')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        //return to the front-end with the suitable variable which will be needed in the front end
        return view('assessment.easy-mode', compact('easy'));
    }
    //thi function is to get the internmediate level of the exam in the front-end

    public function intermediate($tag)
    {
        //this is to take the five question out of q0 question in the front end so that the
        //user gets the random question
        $easy = Assessment::where('label', 'intermediate')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        //return to the front-end with the suitable variable which will be needed in the front end
        return view('assessment.intermediate-mode', compact('easy'));

    }
    //thi function is to get the easy level of the exam in the front-end
    public function hard($tag)
    {
        //this is to take the five question out of q0 question in the front end so that the
        //user gets the random question
        $easy = Assessment::where('label', 'hard')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        //return to the front-end with the suitable variable which will be needed in the front end
        return view('assessment.hard-mode', compact('easy'));

    }

    //this function save the result and then return to the index page from where u can give the assessment again
    public function saveAndExit(Request $request,  AnswerEntry $entry)
    {
        //this adds the result to the result_assesment table
        $entry->resultEntry($request);
        //then this redirect the user to the index page where they can retake the exam
        return redirect()->route('Assessment.index');

    }
    //this function save the result and then return to the next exam page from where u can give the intermediate assessment again

    public function saveAndNext(Request $request, AnswerEntry $entry)
    {
        //here it check the mode of the exam ompleted by the user and then redirect to the exam
        $entry->resultEntry($request);
        //here it check it the exam taken is easy or not
        if ($request->mode == 'easy') {
            //if the easy mode has been completed then it redirect to the intermediate page
            return redirect()->route('intermediate', $request->tag);
        }
        else{
            //and if the intermediate mode has been completed then if redirect to the hard page
            return redirect()->route('hard',$request->tag);
        }

    }

    //here when we click reset we can delete the resukt of the exam and again redo it
    public function destroy(string $id, Request $request)
    {
        //checking the user has alredy got one trash then it forcefully delete it adn then
        $dels=  AssessmentResult::onlyTrashed()->where('user_id',Auth::user()->id)->where('assessment_tag',$request->tag)->first();
        //it deletes the recent one and shows the previous record as this
        $del =  AssessmentResult::where('user_id',Auth::user()->id)->where('assessment_tag',$request->tag)->delete();

        //then we return back to the website assessment take page
       return back();
    }
}
