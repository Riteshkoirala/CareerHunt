@extends('dashboard.dashboard')
@section('content')
    <div class="container mt-xxl-5">
        <div class="left-column mx-2 mt-5">
            Left Column
        </div>
        <div class="center-column me-2">
            <div class="top-row mb-2">
                <form>
                    <div class="d-flex">
                    <input type="text" class="form-control" placeholder="Search for the post here?">
                        <button style="border-radius: 5px; border: 1px solid grey"><i class="bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="bottom-row">
                Bottom Row
            </div>
        </div>
        <div class="right-column mt-5">
            Right Column
        </div>
    </div>
@endsection
