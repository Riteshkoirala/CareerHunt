<div class="modal fade" id="allPost-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $post->id }}"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="d-flex justify-content-end p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3" style="margin-top: -20px">
                {{--                <div class="center-column me-2" style="width: 70%">--}}
                {{--                    <div class="bottom-row">--}}
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
                                @if(Auth::user()->id == $post->user_id || Auth::user()->is_admin =1)
                                    <div class="d-flex">
                                        @if(Auth::user()->id == $post->user_id)
                                            <a class="eddd"
                                               data-bs-toggle="modal"
                                               data-bs-target="#exampleE-{{ $post->id }}"
                                               style="cursor: pointer"><i
                                                    class="bi-pencil-square text-info"></i></a>
                                        @endif
                                        @include('discussion.editPost-model')
                                        <form action="{{ route('post.destroy', $post) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete???')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ddd"
                                                    type="submit"><i class="bi-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                @endif

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
                                    @foreach($post->postComment()->latest()->get() as $comment)
                                        <div class="mb-3" style="background-color: #eeebeb;">

                                            <div class="d-flex p-1 mb-3">
                                                @if($comment->userComment->userProfile->image_name != null)
                                                    <img
                                                        src="{{ asset('storage/user/'.$comment->userComment->userProfile->id.'/'.$comment->userComment->userProfile->image_name) }}"
                                                        height="30" width="30"
                                                        style="border-radius: 25px; border:1px solid purple;">
                                                @else
                                                    <i class="bi-person-circle text-info" style="font-size: 25px"></i>
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
                                                                    type="submit"><i class="bi-trash text-danger"></i>
                                                            </button>
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
                                                                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                              </div>
                            </div>
                        </div>
                    </div>
                    <div>
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
                                           placeholder="write a comment" name="user_id" value="{{ Auth::user()->id }}">
                                    <button class="position-relative border-info"><i
                                            class="bi bi-arrow-right-circle-fill text-info"
                                        ></i></button>
                                </div>
                            </form>
                        @endif
                    </div>
                    {{--        </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
    $(document).ready(function () {

        $('.ckeditor').ckeditor();
        $('#message').ckeditor({
            toolbar: 'Full',
            required: 'required',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });


    });
</script>




