@extends('dashboard.dashboard')
@section('content')
    <div class="bodys bg-light">
        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <div>
            <img src="{{ asset('images/img_9.png') }}" width="100%" height="400px">
        </div>
        <div class="img d-flex justify-content-center" style="margin-top: -150px">
            <div class="imgs">
                <img  class="imgs" src="{{asset($profile->image_path)}}">
            </div>
            <div class="profil">
                <h2>{{ $profile->firstname. " ". $profile->lastname }}</h2>
                <em>joined date: {{ $profile->created_at }}</em>
                <h4>{{ $profile->contact_number }}</h4>
                <h4>{{ $profile->location }}</h4>
            </div>
        </div>
        <div class="detail">
            <div class=>
                <h2>Skills:</h2>
                {{ $profile->skills }}
            </div>
        </div>
        <div class="detail">
            <h3> College Name: {{ $profile->college_name }}</h3>
            <br><h3>Education:</h3>
            <p>{{$profile->education}}</p>
        </div>
        <div class="detail">
            <h2>About Yourself:</h2>
            <p>{{ $profile->about }}</p>
        </div>
        <div class="detail">
            <h2>Experience:</h2>
            <p>{{ $profile->experience }}</p>
        </div>
            <div class="d-flex justify-content-evenly">
        <a class="btn btn-danger" style="width: fit-content; height: fit-content" href="{{ asset($profile->cv_path) }}" download>download cv</a>
        <a class="btn btn-success" href="{{ route('profile.edit', $profile) }}">Update Profile</a>
            <a class="btn btn-info" id="printButton" style="width: fit-content; height: fit-content" href="#">Print Page</a></div>
    </div>
    <script>
        function printPage() {
            window.print();
        }

        document.getElementById("printButton").addEventListener("click", printPage);
    </script>
@stop
