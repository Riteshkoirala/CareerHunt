@extends('dashboard.dashboard')
@section('content')
    <div class="m-4 position-relative">
        <div class=" d-flex justify-content-center pad">
            <div>
                <img id="firstImg" src="{{ asset('/images/img.png') }}" alt="card image">
            </div>
            <div class="mainField">
                <div class="container-fluid cont">
                    <div class="p-2">
                        <h2 class="d-flex justify-content-center">Career Hunt</h2>
                        <h6 class=" d-flex justify-content-center">place to get the answer for your career</h6>
                        <div>
                            <p>Log in OR Sign up <br> Using</p>
                            <button class="form-control bg-danger">GOOGLE</button>
                            <button class="form-control bg-info">LINKEDIN</button>
                            <button class="form-control bg-black">GITHUB</button>
                        </div>
                        <div>
                            <p>Don't Have? Create one </p>
                            <button class="form-control bg-danger">GOOGLE</button>
                            <button class="form-control bg-info">LINKEDIN</button>
                            <button class="form-control bg-black">GITHUB</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
