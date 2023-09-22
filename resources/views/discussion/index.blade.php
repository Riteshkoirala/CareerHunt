@extends('dashboard.dashboard')
@section('content')
    @if ($errors->has('title') || $errors->has('message'))
        <script>
            $(document).ready(function () {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif

    <div class="container mb-5" style="margin-top: 40px; width: 100%; padding-left: 0; padding-right: 0;">
        <div class="left-column d-flex flex-wrap m-2 p-2 position-sticky fixed-top" style="height: fit-content">
            @if(Auth::user()->is_admin == 1)
                <div class="mb-3 p-2 w-100" style=" border: 1px solid black">
                    <h5>Users</h5>
                    @foreach($users as $userSeen)
                        <div class="d-flex justify-content-between rounded text-light"
                             style="background-color: #0d6efd">
                            <div class="p-1  rounded d-flex">
                                @if($userSeen->userProfile->image_name != null)
                                    <img
                                        src="{{ asset('storage/user/'.$userSeen->userProfile->id.'/'.$userSeen->userProfile->image_name) }}"
                                        height="30" width="30" style="border-radius: 25px; border:1px solid purple;">
                                @else
                                    <i class="bi-person-circle text-info" style="font-size: 20px"></i>
                                @endif
                                <p class="mx-2 mt-1">{{ $userSeen->userProfile->firstname." ". $userSeen->userProfile->lastname}}</p>
                            </div>
                            <div class="mt-3"><a href="{{ route('deleteUser',$userSeen->id) }}"
                                                 onclick="return confirm('Are you sure you want to delete this user?')"><i
                                        class="bi bi-trash text-danger m-4"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="p-2" style="border: 1px solid black">
                <h5>LatestPost</h5>
                <div class="">
                    @foreach($ownPosts as $own)
                        <div class="rounded m-2 p-2" style="background-color: lightgrey;">
                            @if($own->user->userProfile->image_name != null)
                                <img
                                    src="{{ asset('storage/user/'.$own->user->userProfile->id.'/'.$own->user->userProfile->image_name) }}"
                                    height="30" width="30" style="border-radius: 25px; border:1px solid purple;"><span
                                    class="mx-2"
                                    style="font-weight: bold; font-size: 13px;">{{ $own->user->userProfile->firstname." ".$own->user->userProfile->lastname }}</span>
                            @else
                                <i class="bi-person-circle text-info" style="font-size: 25px"></i><span class="mx-2"
                                                                                                        style="font-weight: bold; font-size: 13px;">{{ $own->user->userProfile->firstname." ".$own->user->userProfile->lastname }}</span>
                            @endif
                            <h6>{{ $own->title }}</h6>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($own->message), 250, '...') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="center-column me-2" style="width: 70%">
            <div class="top-row mb-2 text-white" style="background-color: #7ea9e8">
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
                    @if(Auth::user() == true)
                        <p style="font-weight: bold">Have something on your mind? post now Click here?</p>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="bg-primary
                    rounded p-2 text-light ml-2 adPo" style="width: 500px; cursor: pointer">+ Post</a>
                        @include('discussion.addPost-model')
                    @endif

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
                                        @if($post->user->userProfile->image_name != null)
                                            <img
                                                src="{{ asset('storage/user/'.$post->user->userProfile->id.'/'.$post->user->userProfile->image_name) }}"
                                                height="50" width="50"
                                                style="border-radius: 25px; border:1px solid purple;">
                                        @else
                                            <i class="bi-person-circle text-info" style="font-size: 40px"></i>
                                        @endif
                                        <div class="">
                                            <p class="mx-2"
                                               style="font-weight: bold; font-size: 15px;">{{ $post->user->userProfile->firstname." ".$post->user->userProfile->lastname }}</p>
                                            <p class="mx-1" style="margin-top: -15px"><em
                                                    style="font-size: 10px;">{{ $post->created_at->diffForHumans() }}
                                                    <i class="bi-globe text-danger"></i></em></p></div>
                                    </div>
                                        <div class="d-flex">
                                            @if(Auth::user()->id == $post->user_id)
                                                <a class="eddd"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#exampleE-{{ $post->id }}"
                                                   style="cursor: pointer"><i
                                                        class="bi-pencil-square text-info"></i></a>
                                            @endif
                                            @include('discussion.editPost-model')
                                                @if(Auth::check() && (Auth::user()->is_admin == 1 || Auth::user()->id == $post->user_id))
                                                    <form action="{{ route('post.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete???')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="ddd" type="submit"><i class="bi-trash text-danger"></i></button>
                                                    </form>
                                                @endif


                                        </div>

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
                                                                       target="_blank"><img
                                                                            src="{{ asset($images->path) }}"
                                                                            alt="Post Image"
                                                                            style="width: 300px; height:300px;"></a>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div>
                                                </div>
                                                @if ($post->postImages->count() > 0)
                                            </div>
                                        @else
                                        @endif
                                    </a>
                                </div>
                                @php
                                    $LikeCount = $post->UserReaction()->wherePivot('reaction', 1)->count();
                                    $DisLikeCount = $post->UserReaction()->wherePivot('reaction', 0)->count();

                                @endphp
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center" style="width: 100%">
                                        <div class="d-flex justify-content-center post"
                                             style="width: 100%; border: 1px solid black; border-radius: 20px">
                                            <input type="hidden" value="{{ $post->id }}" class="getPost">
                                            @if($user->PostReaction()->wherePivot('reaction', 1)->wherePivot('post_id', $post->id)->count()>=1)
                                                <button class="buttonLik-{{ $post->id }}" style="border: none" disabled>
                                                    <i
                                                        class="ic-{{ $post->id }} bi-hand-thumbs-up-fill text-info"></i>{{$LikeCount}}
                                                    Like
                                                </button>

                                            @else
                                                <button class="buttonLik-{{ $post->id }}" style="border: none">
                                                    <i
                                                        class="ic-{{ $post->id }} bi-hand-thumbs-up"></i>
                                                    {{$LikeCount}} Like
                                                </button>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-center post"
                                             style="width: 100%; border: 1px solid black; border-radius: 20px">
                                            @if($user->PostReaction()->wherePivot('reaction', 0)->wherePivot('post_id', $post->id)->count() >=1)
                                                <button class="buttonDis-{{$post->id}}" style="border: none" disabled>
                                                    <i
                                                        class="icn-{{ $post->id }} bi-hand-thumbs-down-fill text-danger"></i>

                                                    {{ $DisLikeCount }} Dislike
                                                </button>
                                            @else
                                                <button class="buttonDis-{{$post->id}}" style="border: none">
                                                    <i
                                                        class="icn-{{ $post->id }} bi-hand-thumbs-down"></i>
                                                    {{ $DisLikeCount }} Dislike
                                            @endif
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
                                                $mes = "See more comment";
                                            $LikeCountc = $comment->userCommentReaction()->wherePivot('reaction', 1)->count();
                                                $DisLikeCountc = $comment->userCommentReaction()->wherePivot('reaction', 0)->count();
                                            @endphp
                                            <div style="background-color: #eeebeb;">
                                                <div class="d-flex p-1">
                                                    @if($comment->userComment->userProfile->image_name != null)
                                                        <img
                                                            src="{{ asset('storage/user/'.$comment->userComment->userProfile->id.'/'.$comment->userComment->userProfile->image_name) }}"
                                                            height="30" width="30"
                                                            style="border-radius: 25px; border:1px solid purple;">
                                                    @else
                                                        <i class="bi-person-circle text-info"
                                                           style="font-size: 25px"></i>
                                                    @endif
                                                    <div class="">
                                                        <p class="mx-2"
                                                           style="font-weight: bold; font-size: 13px;">{{ $comment->userComment->userProfile->firstname." ".$comment->userComment->userProfile->lastname }}</p>
                                                        <p class="mx-2" style="margin-top: -15px"><em
                                                                style=" font-size: 10px;">{{ $comment->created_at->diffForHumans() }}
                                                            </em></p></div>
                                                    @if(Auth::user())
                                                        @if(Auth::user()->id == $comment->user_id)
                                                            <form action="{{ route('comment.destroy', $comment) }}"
                                                                  method="POST"
                                                                  onsubmit="return confirm('Are you sure you want to delete???')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="ddd mx-5"
                                                                        type="submit"><i
                                                                        class="bi-trash text-danger"></i></button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="mx-5">
                                                        <p style="font-size: 12px">{{ $comment->message }}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end" style="width: 20%">
                                                        <div class="d-flex justify-content-center postc"
                                                             style=" border: 1px solid black; border-radius: 20px">
                                                            <input type="hidden" value="{{ $comment->id }}" class="getPost">
                                                            @if($user->commentReaction()->wherePivot('reaction', 1)->wherePivot('comment_id', $comment->id)->count()>=1)
                                                                <button class="buttonLikc-{{ $comment->id }}" style="border: none" disabled>
                                                                    <i
                                                                        class="icc-{{ $comment->id }} bi-hand-thumbs-up-fill text-info"></i>{{$LikeCountc}}
                                                                    Like
                                                                </button>

                                                            @else
                                                                <button class="buttonLikc-{{ $comment->id }}" style="border: none">
                                                                    <i
                                                                        class="icc-{{ $comment->id }} bi-hand-thumbs-up"></i>
                                                                    {{$LikeCountc}} Like
                                                                </button>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-center postc"
                                                             style=" border: 1px solid black; border-radius: 20px">
                                                            @if($user->commentReaction()->wherePivot('reaction', 0)->wherePivot('comment_id', $comment->id)->count() >=1)
                                                                <button class="buttonDisc-{{$comment->id}}" style="border: none" disabled>
                                                                    <i
                                                                        class="icnc-{{ $comment->id }} bi-hand-thumbs-down-fill text-danger"></i>

                                                                    {{ $DisLikeCountc }} Dislike
                                                                </button>
                                                            @else
                                                                <button class="buttonDisc-{{$comment->id}}" style="border: none">
                                                                    <i
                                                                        class="icnc-{{ $comment->id }} bi-hand-thumbs-down"></i>
                                                                    {{ $DisLikeCountc }} Dislike
                                                            @endif
                                                        </div>
                                                        <script>
                                                            $(document).ready(function () {

                                                                var claVal1 = '.buttonLikc-' + {{ $comment->id }};
                                                                var claVal2 = '.buttonDisc-' + {{ $comment->id }};
                                                                $(claVal1).click(function (e) {
                                                                    e.preventDefault();
                                                                    $.ajax({
                                                                        url: '{{ route('likesc') }}', // Replace with the actual URL of your backend API
                                                                        method: 'get', // Use POST or GET depending on your backend API
                                                                        data: {itemId: {{$comment->id}}}, // Send the item ID to the server
                                                                        dataType: 'json',
                                                                        success: function (response) {
                                                                            // Update the count and icon color if the request was successful
                                                                            if (response.success) {
                                                                                $(claVal1).empty().html('<i class="bi-hand-thumbs-up-fill text-info"></i>' + " " + response.like + " Like");
                                                                                $(claVal2).empty().html('<i class="bi-hand-thumbs-down"></i>' + " " + response.DisLike + " Dislike");
                                                                                $(claVal1).prop("disabled", true);
                                                                                $(claVal2).prop("disabled", false);
                                                                            }
                                                                        },
                                                                    });
                                                                });
                                                                $(claVal2).click(function (e) {
                                                                    e.preventDefault();
                                                                    $.ajax({
                                                                        url: '{{ route('Disc') }}', // Replace with the actual URL of your backend API
                                                                        method: 'get', // Use POST or GET depending on your backend API
                                                                        data: {itemId: {{$comment->id}}}, // Send the item ID to the server
                                                                        dataType: 'json',
                                                                        success: function (response) {
                                                                            // Update the count and icon color if the request was successful
                                                                            if (response.success) {
                                                                                $(claVal1).empty().html('<i class="bi-hand-thumbs-up"></i>' + " " + response.like + " Like");
                                                                                $(claVal2).empty().html('<i class="bi-hand-thumbs-down-fill text-danger"></i>' + " " + response.DisLike + " Dislike");
                                                                                $(claVal1).prop("disabled", false);
                                                                                $(claVal2).prop("disabled", true);
                                                                            }
                                                                        },
                                                                    });
                                                                });
                                                            });
                                                        </script>
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
                                <a data-bs-toggle="modal" data-bs-target="#allPost-{{ $post->id }}" class=" adPo p-1"
                                   style="width: 500px; cursor: pointer; font-size: 13px">{{$mes}}</a>
                            @endif
                            @if(Auth::user() == true)
                                <form method="post" action="{{ route('comment.store') }}">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control "
                                               style="border: 1px solid black; border-radius: 0px"
                                               placeholder="write a comment" name="message">
                                        <input type="hidden" class="form-control"
                                               style="border: 1px solid black; border-radius: 0px"
                                               placeholder="write a comment" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" class="form-control"
                                               style="border: 1px solid black; border-radius: 0px"
                                               placeholder="write a comment" name="user_id"
                                               value="{{ Auth::user()->id }}">
                                        <button class="position-relative border-info"><i
                                                class="bi bi-arrow-right-circle-fill text-info"
                                            ></i></button>
                                    </div>
                                </form>

                            @endif
                        </div>
                    </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {

            var claVal1 = '.buttonLik-' + {{ $post->id }};
            var claVal2 = '.buttonDis-' + {{ $post->id }};
            $(claVal1).click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('likes') }}', // Replace with the actual URL of your backend API
                    method: 'get', // Use POST or GET depending on your backend API
                    data: {itemId: {{$post->id}}}, // Send the item ID to the server
                    dataType: 'json',
                    success: function (response) {
                        // Update the count and icon color if the request was successful
                        if (response.success) {
                            $(claVal1).empty().html('<i class="bi-hand-thumbs-up-fill text-info"></i>' + " " + response.like + " Like");
                            $(claVal2).empty().html('<i class="bi-hand-thumbs-down"></i>' + " " + response.DisLike + " Dislike");
                            $(claVal1).prop("disabled", true);
                            $(claVal2).prop("disabled", false);
                        }
                    },
                });
            });
            $(claVal2).click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('Dis') }}', // Replace with the actual URL of your backend API
                    method: 'get', // Use POST or GET depending on your backend API
                    data: {itemId: {{$post->id}}}, // Send the item ID to the server
                    dataType: 'json',
                    success: function (response) {
                        // Update the count and icon color if the request was successful
                        if (response.success) {
                            $(claVal1).empty().html('<i class="bi-hand-thumbs-up"></i>' + " " + response.like + " Like");
                            $(claVal2).empty().html('<i class="bi-hand-thumbs-down-fill text-danger"></i>' + " " + response.DisLike + " Dislike");
                            $(claVal1).prop("disabled", false);
                            $(claVal2).prop("disabled", true);
                        }
                    },
                });
            });
        });
    </script>
    @endforeach
    </div>
    </div>
    <div class="right-column m-2 position-sticky fixed-top" style="height: fit-content;">
        <div class="">
            @foreach($mostLiked as $most)
                <div class="rounded m-2 p-2" style="background-color: lightgrey; width: 300px">
                    @if($most->user->userProfile->image_name != null)
                        <img
                            src="{{ asset('storage/user/'.$most->user->userProfile->id.'/'.$most->user->userProfile->image_name) }}"
                            height="30" width="30" style="border-radius: 25px; border:1px solid purple;">
                    @else
                        <i class="bi-person-circle text-info" style="font-size: 25px"></i>
                    @endif <span class="mx-2"
                                 style="font-weight: bold; font-size: 13px;">{{ $most->user->userProfile->firstname." ".$most->user->userProfile->lastname }}</span>
                    <h6>{{ $most->title }}</h6>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($most->message), 250, '...') }}</p>
                </div>
            @endforeach
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
