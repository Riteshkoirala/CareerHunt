@extends('dashboard.dashboard')
@section('content')
    <div class="bg-light p-3">
        <div class="heading">
            <h3>PHP Assessment - Easy level</h3>

        </div>
        <form>
            <div class="ques">
                @foreach($intermediate as $key=>$interQuestion)
                    <p class="d-none">{{ $key++ }}</p>
                    <p style="font-weight: bold" class="mt-2">{{ $key }}. {{ $interQuestion->question }}</p>
                    @if($interQuestion->coding != null || !empty($interQuestion->coding))
                        <pre>{{ $interQuestion->coding }}</pre>
                    @endif
                    <div class="ans">
                        <pre>{{ $interQuestion->choose }}</pre>
                        <span>Answer:</span><input class="form-control" placeholder="write answer a,b,c,d">
                    </div>
                @endforeach
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-danger">Cancel</a>
                        <button class="btn btn-primary mx-2" >Save and Next</button>
                    </div>            </div>
        </form>
    </div>
@endsection
