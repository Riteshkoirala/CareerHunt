@extends('dashboard.dashboard')
@section('content')
    <div class="bg-light mb-3">
    <div class="container-fluid w-100 h-75" >
        <div class="d-flex" >
            <div class="d-flex justify-content-center w-100" style="padding: 150px 0">
                <div>
            <h1 style="font-size: 43px; font-weight:900">Career Path Finder</h1>
            <p style="font-weight: normal">Discover your ideal career path based on your skills, interests, and goals.</p>
            <button class="btn btn-danger btn-lg">Get Started</button>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-end" style="margin-top: 50px">
                <img  width="800px" src="{{ asset('images/img_5.png') }}"  style=" background-size: cover; ">
            </div>
        </div>

    </div>
    <div>
        <hr class="text-info">
        <div class="container">
            <div class="container-fluid d-flex flex-wrap justify-content-center p-5" style="background-color: yellow; color: black">
                <h3 style="font-weight: normal">Discover your ideal career path based on your skills, interests, and goals.</h3>
                <h2 style="font-weight: 500">Career Recommender</h2>
            </div>
        </div>
    </div>
    </div>
@endsection
