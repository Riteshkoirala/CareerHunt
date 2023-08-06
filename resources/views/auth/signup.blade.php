@extends('dashboard.dashboard')
@section('content')
    <div class=" position-relative" style="margin: -20px">
        <div class=" d-flex justify-content-center pad">
            <div>
                <img id="firstImg" src="{{ asset('/images/img.png') }}" alt="card image">
            </div>
            <div class="mainField">
                <div class="container-fluid cont">
                    <div class="p-2">
                        <h2 class="d-flex justify-content-center">Career Hunt</h2>
                        <h6 class=" d-flex justify-content-center" style="color: orange">Place to get the answer for your career</h6>
                        <div>
                            <p class="d-flex justify-content-center mt-5"  style="font-weight: bold"> Login OR Sign up </p>
                            <a class="form-control bg-danger d-flex justify-content-center " href="{{ route('googleSignin') }}"><i class="bi-google" style="color: yellow; font-size: 25px"></i></a>
                            <a class="form-control d-flex justify-content-center mt-2" style="background-color: skyblue"><i class="bi-linkedin " style="color: darkblue ; font-size: 25px"></i></a>
                            <a class="form-control bg-black d-flex justify-content-center mt-2"><i class="bi-github text-light" style="font-size: 25px"></i></a>
                        </div>
                        <div>
                            <p class="d-flex justify-content-center mt-5"> OR</p>
                            <p>Don't Have? Create  Account: <a href="https://accounts.google.com/signup/v2/createaccount?flowName=GlifWebSignIn&flowEntry=SignUp" target="_blank" class="text-info">&nbsp;&nbsp;<i class="bi-google" style="color: orange; font-size: 25px"></i></a> <a href="https://www.linkedin.com/signup?trk=guest_homepage-basic_nav-header-join" target="_blank">&nbsp;&nbsp;<i class="bi-linkedin " style="color: deepskyblue; font-size: 25px"></i></a><a href="https://github.com/signup?ref_cta=Sign+up&ref_loc=header+logged+out&ref_page=%2F&source=header-home" target="_blank" class="text-info">&nbsp;&nbsp;<i class="bi-github text-dark" style="color: yellow; font-size: 25px"></i></a></p>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

