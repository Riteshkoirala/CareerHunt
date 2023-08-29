<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment\Assessment;

class AssessmentController extends Controller
{
    public function index()
    {
        return view('assessment.index');

    }
    public function easy()
    {
        $easy = Assessment::where('label', 'easy')->inRandomOrder()->limit(5)->get();
        return view('assessment.easy-mode', compact('easy'));
    }
    public function intermediate()
    {
        $intermediate = Assessment::where('label', 'intermediate')->inRandomOrder()->limit(5)->get();
        return view('assessment.intermediate-mode', compact('intermediate'));

    }
    public function hard()
    {
        $hard = Assessment::where('label', 'hard')->inRandomOrder()->limit(5)->get();
        return view('assessment.hard-mode', compact('hard'));

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
    public function destroy(string $id)
    {
        //
    }
}
