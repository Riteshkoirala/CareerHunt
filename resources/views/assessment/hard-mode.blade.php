@extends('dashboard.dashboard')
@section('content')
    <div class="bg-light p-3">
        <div class="heading">
            <h3>PHP Assessment - Hard level</h3>

        </div>
        <form id="myForm" action="{{ route('save-and-exit') }}" method="post">
            @csrf
            <div class="ques">
                @foreach($easy as $key=>$easyQuestion)
                    <p class="d-none">{{ $key++ }}</p>
                    <p style="font-weight: bold" class="mt-2">{{ $key }}. {{ $easyQuestion->question }}</p>
                    @if($easyQuestion->coding != null || !empty($easyQuestion->coding))
                        <pre>{{ $easyQuestion->coding }}</pre>
                    @endif
                    <div class="ans">
                        <pre>{{ $easyQuestion->choose }}</pre>
                        {{--                    <input type="hidden" class="form-control" name="questions[]" val placeholder="write answer a,b,c,d">--}}
                        <span>Answer:</span><input type="text" class="form-control" name="answers[{{ $easyQuestion->id }}]" placeholder="write answer a,b,c,d">
                    </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    <input type="hidden" value="{{ $easyQuestion->tag }}" name="tag">
                    <input type="hidden" value="hard" name="mode">
                    <a class="btn btn-primary"  href="{{ route('Assessment.index') }}">cancel</a>
                    <button id="saveAndExitButton" class="btn btn-danger mx-2">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const saveAndExitButton = document.getElementById('saveAndExitButton');
            const saveAndNextButton = document.getElementById('saveAndNextButton');
            const form = document.getElementById('myForm');

            saveAndExitButton.addEventListener('click', function () {
                // Update the form action URL
                form.action = "{{ route('save-and-exit') }}";
                // Submit the form
                form.submit();
            });

            saveAndNextButton.addEventListener('click', function () {
                // Update the form action URL
                form.action = "{{ route('save-and-next') }}"; // Change to your desired route
                // Submit the form
                form.submit();
            });
        });
    </script>

@endsection
