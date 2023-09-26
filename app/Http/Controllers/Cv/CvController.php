<?php

namespace App\Http\Controllers\Cv;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Http\Services\ImageSaver;
use App\Models\Cv\Cv;
use Illuminate\Support\Facades\Auth;
//this is the controller for the cv page
class CvController extends Controller
{
   //this function is used to show the cv crete page when wwe visit there with the necessary detail
    public function index()
    {
        //here we are getting the cv data from the auth user
        $cvData = Cv::where('user_id',Auth::user()->id)->first();
        if ($cvData){
            //if the cvdata is true then twe send it to edit page but if the cv data is false we send it to the
            //edit page
            return view('cv.edit',compact('cvData'));
        }
        //here if above is wrong we send to the create page where the user will be able to create the cv
        return view('cv.create');
    }

    //this function is to save the cv of the person or
    //can be said as the cv detail of the person
    public function store(StoreCvRequest $request, ImageSaver $imageSaver)
    {
        //here it validates the data that has came from the front end then it redirect
        //back if there are some result
        $dataValidate = $request->validated();
        //if the use has the image attached with the form whicle sending then we got
        //through this process to save it in folder
        if($request->has('image') && $request->image != null) {
            //this is the variable which get the image after it save it
            $imageName = $imageSaver->imageStore($dataValidate, 'cv');
            //now we are adding the image name in the cv database
            $dataValidate['image_name'] = $imageName;
        }
        // now here we check if the user witht the same id is persent in the cv database or not
        $cv = CV::where('user_id', Auth::user()->id)->first();
        //if the user is present from before it will just update the table
        if ($cv) {
            //this is used to update the database of cv
            $cv->update($dataValidate);
        } else {
            //if the record of the user is not in the database then it will create the new one
            $cv = CV::create($dataValidate);
        }
        //after the successful processes the user will be redirected back
        return back();
    }

    //from this we are going to print the cv
    public function getPDF()
    {
        //from this we will get all the cv data of the users which is logged in
        $cvData = Cv::where('user_id',Auth::user()->id)->first();
        //then we return that to the page to print which is as shown in here
        return view('cv.cvpdf',compact('cvData'));
    }

    //this will help in the update fo the photo
    //like if you have it then it will help to remove it
    public function photoUpdate($id){
        //first it will check the database for the cv present
        $cvData = Cv::where('user_id',Auth::user()->id)->first();
        //then update by making it null
        $cvData->update([
            'image_name'=>null,
            'image_path'=>null,
        ]);
        //then return back to the page u were before
        return back();
    }

}
