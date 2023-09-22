@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid w-100 p-5 bg-light">
        <div class="w-100 p-4 align-items-center" style="margin-top:-30px;box-shadow: 0px 0px 10px 5px lightgrey">
            <div class="d-flex justify-content-center">
                <h3>Find your career job from here</h3>
            </div>
            <hr>
            <form accept="{{ route('recommend') }}" method="get">
            <div class="d-flex w-100">
                <div class=" w-100">
                    <label>Your Top Most Talent</label>
                    <input type="text" name="skills_input[]" class="form-control"  placeholder="Python, java">
                </div>
{{--                <div class=" w-100 mx-4">--}}
{{--                    <label>Your interested field</label>--}}
{{--                    <input type="text" class="form-control" placeholder="software developer">--}}
{{--                </div>--}}
                <button class="btn btn-danger">Recommend</button>
            </div>

        </form>
        </div>
        <div class="container bg-danger text-light p-3 m-3">
            <div class="">
                <h5>Notes: Most common knowledge should have  before joining any job.</h5>
                <ul>
                    <li>Basis of HTML, CSS, JS and some Database knowledge.</li>
                    <li>Most have knowledge of Github.</li>
                </ul>
            </div>
        </div>
        <div class="">
            <h1>Recommendations</h1>

            @php
                $recommendationsArray = explode(', ', $recommendations);
            @endphp

            @foreach(array_slice($recommendationsArray, 0, 20) as $question)
                @php
                    // Remove brackets and extra spaces
                    $cleanedQuestion = str_replace(['[', ']', ','], '', $question);

                    // Remove single quotes from each recommendation
                    $cleanedQuestion = str_replace("'", "", $cleanedQuestion);
                @endphp

                <div class="bg-primary p-3 m-5 text-light rounded" style="border: 1px solid black;">
                    <a href="#" class="text-light">{{ $cleanedQuestion }}</a>

                    <!-- Create a container to display the information retrieved via AJAX -->
                    <div class="additional-info" id="info-{{ $loop->index }}"></div>

                    <!-- Add a button or trigger to fetch information via AJAX -->
                    <button class="fetch-info-btn" data-question="{{ $cleanedQuestion }}" data-index="{{ $loop->index }}">Fetch Info</button>
                </div>
            @endforeach

            <!-- Include jQuery for AJAX -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                // Your Google Custom Search API key
                var apiKey = 'AIzaSyCy4efd6JNpG8Lp1gqyCesAzd7jBWM_C1w';

                // Your Google Custom Search Engine ID
                var cx = '95879294433354af0';

                $('.fetch-info-btn').on('click', function() {
                    var question = $(this).data('question');
                    var index = $(this).data('index'); // Get the loop index

                    // Send an AJAX request to Google Custom Search API
                    $.ajax({
                        url: 'https://www.googleapis.com/customsearch/v1',
                        method: 'GET',
                        data: {
                            key: apiKey,
                            cx: cx,
                            q: question,
                            num: 5 // Limit to 5 search results
                        },
                        success: function(response) {
                            // Clear previous results
                            $('#info-' + index).empty();

                            if (response.items && response.items.length > 0) {
                                // Display search results
                                $.each(response.items, function (i, item) {
                                    var title = item.title;
                                    var link = item.link;
                                    var snippet = item.snippet;

                                    // Create a list item for each result
                                    var listItem = $('<div><a target=_blank href="' + link + '">' + title + ' </a></div>');
                                    listItem.append('<p>' + snippet + '</p>');
                                    $('#info-' + index).append(listItem);
                                });
                            } else {
                                // Handle the case when no results are found
                                $('#info-' + index).html("<p>No information found.</p>");
                            }
                        },
                        error: function() {
                            alert('An error occurred while fetching information.');
                        }
                    });
                });
            </script>





        </div>
    </div>

@endsection
