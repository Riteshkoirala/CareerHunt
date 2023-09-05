<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Services\Assessment\AnswerEntry;
use App\Models\Assessment\Assessment;
use App\Models\Assessment\AssessmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = DB::table('assessments')
            ->select('tag', DB::raw('COUNT(*) as count'))
            ->groupBy('tag')
            ->get();
        $resultCheck = AssessmentResult::where('user_id',Auth::user()->id)->first();

        $trash = AssessmentResult::onlyTrashed()->where('user_id',Auth::user()->id)->latest()->first();

        return view('assessment.index',compact('assessments','resultCheck','trash'));

    }
    public function easy($tag)
    {
        $easy = Assessment::where('label', 'easy')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        return view('assessment.easy-mode', compact('easy'));
    }
    public function intermediate($tag)
    {
        $easy = Assessment::where('label', 'intermediate')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        return view('assessment.intermediate-mode', compact('easy'));

    }
    public function hard($tag)
    {
        $easy = Assessment::where('label', 'hard')->where('tag',$tag)->inRandomOrder()->limit(5)->get();
        return view('assessment.hard-mode', compact('easy'));

    }

    public function saveAndExit(Request $request,  AnswerEntry $entry)
    {
        $entry->resultEntry($request);
        return redirect()->route('Assessment.index');

    }
    public function saveAndNext(Request $request, AnswerEntry $entry)
    {
        $entry->resultEntry($request);
        if ($request->mode == 'easy') {
            return redirect()->route('intermediate', $request->tag);
        }
        else{
            return redirect()->route('hard',$request->tag);
        }

//        dd($request);



    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $dels=  AssessmentResult::onlyTrashed()->where('user_id',Auth::user()->id)->where('assessment_tag',$request->tag)->first();
        $del =  AssessmentResult::where('user_id',Auth::user()->id)->where('assessment_tag',$request->tag)->delete();

       return back();
    }
}
