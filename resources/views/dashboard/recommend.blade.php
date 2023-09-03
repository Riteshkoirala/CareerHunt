@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid w-100 h-75 p-5 bg-light">
        <div class="w-100 p-4 align-items-center" style="margin-top:-30px;box-shadow: 0px 0px 10px 5px lightgrey">
            <div class="d-flex justify-content-center">
                <h3>Find your career job from here</h3>
            </div>
            <hr>
            <form>
            <div class="d-flex w-100">
                <div class=" w-100">
                    <label>Your Top Most Talent</label>
                    <input type="text" class="form-control"  placeholder="Python, java">
                </div>
                <div class=" w-100 mx-4">
                    <label>Your interested field</label>
                    <input type="text" class="form-control" placeholder="software developer">
                </div>
                <button class="btn btn-danger">Recommend</button>
            </div>

        </form>
        </div>
    </div>

@endsection
