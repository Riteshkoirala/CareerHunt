<?php

namespace App\Http\Controllers\Cv;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Models\Cv\Cv;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cv.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCvRequest $request)
    {
        $dataValidate = $request->validated();
        $cv = CV::where('user_id', 1)->first();
        if ($cv) {
            $cv->update($dataValidate);
        } else {
            $cv = CV::create($dataValidate);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cv $cv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCvRequest $request, Cv $cv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        //
    }

    public function getPDF()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('cv.cvpdf');

        return $pdf->stream();
    }

}
