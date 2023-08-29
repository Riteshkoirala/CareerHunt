@extends('dashboard.dashboard')
@section('content')
    @if ($errors->any())
        <script>
            $(document).ready(function () {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif
    <div class="container mb-5" style="margin-top: 40px; width: 100%; padding-left: 0; padding-right: 0;">
        <div class="left-column m-2 p-2 position-sticky fixed-top" style="height: 200px">
            Left Column
        </div>
        <div class="center-column me-2" style="width: 70%">
            <div class="top-row mb-2">
                <div>
                    <form>
                        <div class="d-flex">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                   placeholder="Search for the post here?">
                            <button style="border-radius: 5px; border: 1px solid deepskyblue"><i
                                    class="bi-search text-success"></i></button>
                            <a class="p-2 bg-danger text-light" style="border-radius: 10px"
                               href="{{ route('post.index') }}"> Reset</a>
                        </div>
                    </form>
                    {{--                    @if(Auth::user() == true)--}}
                    <p style="font-weight: bold">Have something on your mind? post now Click here?</p>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="bg-primary
                    rounded p-2 text-light ml-2 adPo" style="width: 500px; cursor: pointer">+ Post</a>
                    @include('discussion.addPost-model')
                    {{--                    @endif--}}

                </div>
            </div>
            <div class="bottom-row">
                @foreach($posts as $post)
                    <div class="p-4 bg-light">
                        <div class="d-flex justify-content-center">
                            <div class="p-4 light-show"
                                 style="box-shadow: 2px 2px 10px 5px lightgrey; border-radius: 20px; width: 600px">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <i class="bi-person-circle text-info" style="font-size: 40px"></i>
                                        <span class="mx-2"
                                              style="font-weight: bold; font-size: 15px;">Ritesh Koirala</span>
                                        <em style="margin-top:20px; margin-left: -110px; font-size: 10px;">{{ $post->created_at->diffForHumans() }}
                                            <i class="bi-globe text-danger"></i></em></div>
                                    {{--                                @if(Auth::user())--}}
                                    {{--                                    @if(Auth::user()->id == $post->user_id)--}}
                                    <div class="d-flex"><a class="eddd"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#exampleE-{{ $post->id }}"
                                                           style="cursor: pointer"><i
                                                class="bi-pencil-square text-info"></i></a></span>
                                        @include('discussion.editPost-model')
                                        <form action="{{ route('post.destroy', $post) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete???')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ddd"
                                                    type="submit"><i class="bi-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                    {{--                                    @endif--}}
                                    {{--                                @endif--}}

                                    {{--                            <i class="bi-trash text-danger"></i></a></span>--}}


                                </div>
                                <div class="click-shadow">
                                    <a href="#">
                                        <h5 class="mt-2 mx-1 d-flex justify-content-center">{{ $post->title }}</h5>
                                        <p>
                                    <span
                                        class="ha">{{ \Illuminate\Support\Str::limit(strip_tags($post->message), 250, '...') }}</span>
                                            @if (\Illuminate\Support\Str::wordCount(strip_tags($post->message)) > 50)
                                                <a style="cursor: pointer" class="see-more">See More</a>
                                                <span class="full-message"
                                                      style="display: none;">{{ strip_tags($post->message) }}</span>
                                                <a style="cursor: pointer" class="see-less">See Less</a>
                                            @endif
                                        </p>
                                            @if ($post->postImages->count() > 0)
                                            <div style="background-color: lightgrey;" class="p-3">
                                                @else
                                                    <div>
                                            @endif
                                            <div>
                                                @foreach($post->postImages as $images)
                                                    @if (str_contains($images->name, 'jpg') === false && str_contains($images->name, 'png') === false)
                                                        <a href="{{ asset($images->path) }}" class="text-success"
                                                           target="_blank">{{ $images->name }}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @php
                                                $count=0;
                                            @endphp
                                            @foreach($post->postImages as $images)
                                                @if (str_contains($images->name, '.jpg') === true || str_contains($images->name, '.png') === true)
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <div style="margin-top: 0px">
                                                @foreach($post->postImages as $images)
                                                    @if (str_contains($images->name, '.jpg') === true || str_contains($images->name, '.png') === true)
                                                        @if($count == 1)
                                                            <div class="d-flex justify-content-center">
                                                                <a href="{{ asset($images->path) }}"
                                                                   class="text-success"
                                                                   target="_blank"><img src="{{ asset($images->path) }}"
                                                                                        alt="Post Image"
                                                                                        style="width: 300px; height:300px;"></a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center" style="width: 100%">
                                        <div class="d-flex justify-content-center"
                                             style="width: 100%; border: 1px solid black; border-radius: 20px"><span
                                                class="count1"></span>
                                            <button class="button1" style="border: none"><i
                                                    class="bi-hand-thumbs-up-fill text-info"></i>Like
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-center"
                                             style="width: 100%; border: 1px solid black; border-radius: 20px"><span
                                                class="count2">0</span>
                                            <button class="button2" style="border: none"><i
                                                    class="bi-hand-thumbs-down-fill text-danger"></i>Unlike
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div style=" border-radius: 30px">
                                        @php
                                            $mes = "Write the first Comment"
                                        @endphp
                                        @foreach($post->postComment()->orderBy('created_at', 'desc')->get() as $comment)
                                            @php
                                            $mes = "See more comment"
                                            @endphp
                                            <div style="background-color: #eeebeb;">
                                            <div class="d-flex p-1" >
                                                <i class="bi-person-circle text-info" style="font-size: 20px"></i>
                                                <span class="mx-2" style="font-weight: bold; font-size: 13px;">Ritesh Koirala</span>
                                                <em style="margin-top:20px; margin-left: -100px; font-size: 10px;">{{ $comment->created_at->diffForHumans() }}
                                                </em>
                                                {{--                                                                @if(Auth::user())--}}
                                                {{--                                                                    @if(Auth::user()->id == $post->user_id)--}}
                                                <form action="{{ route('comment.destroy', $comment) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete???')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="ddd mx-5"
                                                            type="submit"><i class="bi-trash text-danger"></i></button>
                                                </form>
                                                {{--                                                                    @endif--}}
                                                {{--                                                                @endif--}}
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="mx-3">
                                                    <p style="font-size: 12px">{{ $comment->message }}</p>
                                                </div>
                                                <div class="d-flex justify-content-end" style="width: 20%">
                                                    <div class="d-flex justify-content-center"
                                                         style="width: 100%; border: 1px solid black; border-radius: 20px"><span
                                                            class="count1">0</span>
                                                        <button class="button1" style="border: none"><i
                                                                class="bi-hand-thumbs-up-fill text-info"></i>
                                                        </button>
                                                    </div>
                                                    <div class="d-flex justify-content-center"
                                                         style="width: 100%; border: 1px solid black; border-radius: 20px"><span
                                                            class="count2">0</span>
                                                        <button class="button2" style="border: none"><i
                                                                class="bi-hand-thumbs-down-fill text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @break
                                            </div>
                                    </div>
                                </div>
                                                @endforeach
                                    </div>

                                    <div>
                                    @include('discussion.see-post-modal')
                                        @if($post->postComment != null)
                                        <a data-bs-toggle="modal" data-bs-target="#allPost" class=" adPo p-1"
                                       style="width: 500px; cursor: pointer; font-size: 13px">{{$mes}}</a>
                                        @endif
                                    <form method="post" action="{{ route('comment.store') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                   style="border: 1px solid black; border-radius: 0px"
                                                   placeholder="write a comment" name="message">
                                            <input type="hidden" class="form-control"
                                                   style="border: 1px solid black; border-radius: 0px"
                                                   placeholder="write a comment" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" class="form-control"
                                                   style="border: 1px solid black; border-radius: 0px"
                                                   placeholder="write a comment" name="user_id" value="1">
                                            <button class="position-relative border-info"><i
                                                    class="bi bi-arrow-right-circle-fill text-info"
                                                ></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

        @endforeach
    </div>
    </div>
    <div class="right-column m-2 p-2 position-sticky fixed-top" style="height: 200px">
        <div class="">
            Right Column
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.addNew').on('click', () => {
                $('.posting').removeClass('d-none');
            });
            $('.fixi').on('click', () => {
                $('.posting').addClass('d-none');
                $('form input[type="text"]').val('');
                $('form textarea').val('');
                $('form input[type="file"]').val('');
            });
            $('#add-attachment-button').click(function () {
                // Create a new file input element
                let deleteButton = $('<label class="delete-button mt-2 mr-2 bg-warning p-1"><i class="bi-trash text-danger mt-5"></label>');
                let newInput = $('<input type="file" class="form-control mt-2" style="background-color:darkgrey; color: white" name="files[]">');
                let newAttachmentItem = $('<div class="attachment-item d-flex justify-content-between text-black"></div>');
                newAttachmentItem.append(deleteButton, newInput);
                $('#attachment-create').append(newAttachmentItem);
                deleteButton.click(function () {
                    newAttachmentItem.remove(); // Remove the corresponding attachment item
                });
            });
            $(this).next('.full-message').next('.see-less').show();
            $(document).on('click', '.see-more', function (e) {
                e.preventDefault();
                $(this).hide();
                $(this).next('.see-less').show();
                $(this).next('.ha').hide();
                $(this).next('.full-message').show();
                $(this).next('.full-message').next('.see-less').show();
            });
            $(document).on('click', '.see-less', function (e) {
                e.preventDefault();
                $(this).hide();
                $(this).prev('.full-message').hide();
                $(this).prev('.full-message').prev('.see-more').show();
            });

            let countValue1 = 0;
            let countValue2 = 0;

            $(document).on('click', '.button1', function (e) {
                countValue1++;
                $('.count1').text(countValue1);
            });

            $(document).on('click', '.button2', function (e) {
                countValue2++;
                $('.count2').text(countValue2);
            });

            $('.ckeditor').ckeditor();
            $('#message').ckeditor({
                toolbar: 'Full',
                required: 'required',
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });


        });
    </script>
@endsection
