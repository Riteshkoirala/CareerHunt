<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalResourceRequest;
use App\Http\Requests\UpdateAdditionalResourceRequest;
use App\Http\Services\ImageSaver;
use App\Models\AdditionalResource;

class AdditionalResourceController extends Controller
{

    public function index()
    {
        //this function si to get the additional resource page
        $resources = AdditionalResource::get();
        //this is the view of the additional page
        return view('additional-resource.index', compact('resources')) ;
    }


    public function store(StoreAdditionalResourceRequest $request, ImageSaver $imageSaver)
    {
        //this function saves the addtitional resiurces
        //this also validates the input from front
        $resource = $request->validated();
        //this dsaves the image in the database
        $image = $imageSaver->imageHelp($request, 'images/resource');
        //this saves the image as image
        $resource['image'] = $image;

        //it sores in the databases
        $store = AdditionalResource::create($resource);
        //redirect in the page we were in witht eh message
        return back()->with('Success','Additional Resource Has been saved successfully');
    }

    public function update(UpdateAdditionalResourceRequest $request, AdditionalResource $additionalResource, ImageSaver $imageSaver)
    {
        //this function update the additinal resources
        $resource = $request->validated();
        //it the file contains then it willsave it in here
        if($request->image != null){
            //this function is use to saves the file
        $image = $imageSaver->imageHelp($request, 'images/resource');
        //give the image name in the databse
        $resource['image'] = $image;}
//this is used to update the database
        $update = $additionalResource->update($resource);
        //it will redirect to the same page before
        return back()->with('Success','Additional Resource Has been updated successfully');
    }
    public function destroy(AdditionalResource $additionalResource)
    {
        //this function deleted the additional resource
        $additionalResource->delete();
        //then redirect to the page before
        return back()->with('Success','Successfully deleted');
    }
}
