@extends('dashboard.dashboard')
@section('content')
    <div class="bg-light p-3 h-75">
        <div class="heading">
            <h3>Test Your Skills With Assessment Test</h3>

        </div>
        <div class=" asses p-3">
            <div>
                <div class=" lay p-3">
                    <div>
                        <div>
                            <img src="{{ asset('images/img_1.png') }}" width="200px" height="100px">
                        </div>
                        <hr>
                        <div class="mx-3">
                            <h5>PHP Assessment</h5>
                            <hr>
                            <p>Completed: Easy-Mode</p>
                            <p style="margin-top: -10px">Mark: 0/100</p>
                            <p style="margin-top: -10px">Previous-Result: 0/100</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('easy') }}" class="btn btn-success">Take Test</a>
                            <a class="btn btn-info">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
