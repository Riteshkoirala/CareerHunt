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
                            <p class="d-flex justify-content-center mt-5"  style="font-weight: bold">Log in </p>
                            <a class="form-control bg-danger d-flex justify-content-center " href="{{ route('googleSignin') }}"><i class="bi-google" style="color: yellow; font-size: 25px"></i></a>
                            <a class="form-control d-flex justify-content-center" style="background-color: skyblue"><i class="bi-linkedin " style="color: darkblue ; font-size: 25px"></i></a>
                            <a class="form-control bg-black d-flex justify-content-center"><i class="bi-github text-light" style="font-size: 25px"></i></a>
                        </div>
                        <div>
                            <p class="d-flex justify-content-center mt-5"> OR</p>
                            <p>Don't Have? Create one<a href="{{ route('signup') }}" class="text-info">&nbsp;&nbsp;Sign-up</a></p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
