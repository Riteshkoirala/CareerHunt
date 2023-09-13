@extends('dashboard.dashboard')
@section('content')

    <div class="bg-light p-3 mb-5">
{{--        <div class="btn btn-primary" style="width: fit-content">+New Assessment</div>--}}
        <div class="heading" style="">
            <h3>Test Your Skills With Assessment Test</h3>

        </div>
        <hr>
        <div class=" asses p-3">
            @foreach($assessments as $assessment)
            <div class="mx-3">
                <div class=" lay p-3">
                    <div>
                        <div>
                            <img src="{{ asset('images/img_1.png') }}" width="200px" height="100px">
                        </div>
                        <hr>
                        <div class="mx-3">
                            <h5>{{$assessment->tag}} Assessment</h5>
                            <hr>
                            @if($resultCheck != null && $resultCheck->assessment_tag == $assessment->tag)
                                <p>Completed-status: {{ $resultCheck->mode }}-mode</p>
                            @if($resultCheck->mode == 'hard')
                                <p style="margin-top: -10px">Mark: {{$resultCheck->mark}}/100</p>
                                @else
                                    <p style="margin-top: -10px">Mark: 0/100</p>
                                @endif
                                @if($trash != null && $resultCheck->assessment_tag == $assessment->tag)
                                    <p style="margin-top: -10px">Previous Mark: {{$trash->mark}}/100</p>
                                @endif
                        </div>
                                <div class="d-flex justify-content-between">
                                    @if($resultCheck->mode == 'easy')
                                        <a href="{{ route('intermediate',$assessment->tag) }}" class="btn btn-success">Take Test</a>
                                        @elseif($resultCheck->mode == 'intermediate')
                                        <a href="{{ route('hard',$assessment->tag) }}" class="btn btn-success">Take Test</a>
                                        @elseif($resultCheck->mode == 'hard')
                                        <a href="{{ route('hard', $assessment->tag) }}" class="btn btn-success disabled-link" disabled>Take Test</a>
                                    @endif
                                    <form action="{{ route('Assessment.destroy', $resultCheck->id) }}" method="post" onsubmit="return confirm('Are You sure to reset your progress.')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="tag" value="{{ $assessment->tag }}">
                                        <button class="btn btn-info">Reset</button>
                                    </form>
                                </div>
                            @else
                            <p>Completed-status: Not Started</p>
                            <p style="margin-top: -10px">Mark: 0/100</p>
                            @if($trash != null && $trash->assessment_tag == $assessment->tag)
                                <p style="margin-top: -10px">Previous Mark: {{$trash->mark}}/100</p>
                            @else
                                <p style="margin-top: -10px">Previous Mark: 0/100</p>
                            @endif

                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('easy', $assessment->tag) }}" class="btn btn-success">Take Test</a>
                            <a class="btn btn-info">Reset</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
