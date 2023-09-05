<?php

namespace App\Http\Services\Assessment;

use App\Models\Assessment\Assessment;
use App\Models\Assessment\AssessmentResult;
use Illuminate\Support\Facades\Auth;

class AnswerEntry
{
    public function resultEntry($request){
        $mark = 0;
        foreach ($request->answers as $key=>$answer){
            $result = Assessment::where('id',$key)->where('answer',$answer)->first();
            if($result) {
                if ($request->mode == 'easy') {
                    $mark += 5;
                }
                if ($request->mode == 'intermediate') {
                    $mark += 7;
                }
                if ($request->mode == 'hard') {
                    $mark += 8;
                }
            }
        }

        $user = Auth::user();
        $tag = $request->tag;
        $markToAdd = $mark;
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
