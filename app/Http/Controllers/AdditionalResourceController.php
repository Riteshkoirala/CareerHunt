<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalResourceRequest;
use App\Http\Requests\UpdateAdditionalResourceRequest;
use App\Http\Services\ImageSaver;
use App\Models\AdditionalResource;

class AdditionalResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = AdditionalResource::get();
        return view('additional-resource.index', compact('resources')) ;
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
    public function store(StoreAdditionalResourceRequest $request, ImageSaver $imageSaver)
    {

        $resource = $request->validated();
        $image = $imageSaver->imageHelp($request, 'images/resource');
        $resource['image'] = $image;

        $store = AdditionalResource::create($resource);
        return back()->with('Success','Additional Resource Has been saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalResource $additionalResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalResource $additionalResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdditionalResourceRequest $request, AdditionalResource $additionalResource, ImageSaver $imageSaver)
    {
        $resource = $request->validated();
        if($request->image != null){
        $image = $imageSaver->imageHelp($request, 'images/resource');
        $resource['image'] = $image;}

        $update = $additionalResource->update($resource);
        return back()->with('Success','Additional Resource Has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalResource $additionalResource)
    {
        $additionalResource->delete();
        return back()->with('Success','Successfully deleted');
    }
}
