<?php

namespace App\Http\Services\Assessment;

use App\Models\Assessment\Assessment;
use App\Models\Assessment\AssessmentResult;
use Illuminate\Support\Facades\Auth;

class AnswerEntry
{
    //this function gives the entry to the result of the user exam
    //from here we calcualte the result
    public function resultEntry($request){
        $mark = 0;
        //checking if the answer is correct to give the result to the user
        foreach ($request->answers as $key=>$answer){
            //getting correct answer of the question
            $result = Assessment::where('id',$key)->where('answer',$answer)->first();
            if($result) {
                //the the mode is easy then we give only 5 mark
                if ($request->mode == 'easy') {
                    //adding the mark in here
                    $mark += 5;
                }
                //if the mode is intermediate is internediate than we give 7 mark
                if ($request->mode == 'intermediate') {
                    //adding the mark in here
                    $mark += 7;
                }
                //if the mode is hard is hard than we give 7 mark
                if ($request->mode == 'hard') {
                    //adding the mark in here
                    $mark += 8;
                }
            }
        }
        //getting the auth user
        $user = Auth::user();
        //then taking which exam has been given by the user
        $tag = $request->tag;
        //the we are addting above calculated mark
        $markToAdd = $mark;
        //then we are updating after the each exam has been done
        //it creates if the users is not available and update if the result is available
        //by adding the mark
        AssessmentResult::updateOrCreate(
            [
                'user_id' => $user->id,
                'assessment_tag' => $tag,
            ],
            [
                'mode' => $request->mode,
                'mark' => \DB::raw("mark + $markToAdd"),
                'updated_at' => now(),
            ]
        );
    }
}
