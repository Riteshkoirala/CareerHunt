<div class="modal fade" id="allPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="d-flex justify-content-end p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3" style="margin-top: -20px">
                <div class="">
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
                                            <div style="background-color: lightgrey;" class="p-3">
                                                @if ($post->postImages->count() > 0)
                                                    {{--                                            <p class="text-danger">Links:</p>--}}
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
                                        <div>
                                            <div class="p-1" style="background-color: #eeebeb; border-radius: 30px">
                                                <div class="d-flex">
                                                    <i class="bi-person-circle text-info" style="font-size: 20px"></i>
                                                    <span class="mx-2" style="font-weight: bold; font-size: 13px;">Ritesh Koirala</span>
                                                    <em style="margin-top:20px; margin-left: -100px; font-size: 10px;">{{ $post->created_at->diffForHumans() }}
                                                    </em>
                                                    {{--                                                                @if(Auth::user())--}}
                                                    {{--                                                                    @if(Auth::user()->id == $post->user_id)--}}
                                                    <form action="{{ route('post.destroy', $post) }}" method="POST"
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
                                                        <p style="font-size: 12px">Yes, thats an great idea in a way you are thinking</p>
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
                                            <div>

                                                <form>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               style="border: 1px solid black; border-radius: 0px"
                                                               placeholder="write a comment">
                                                        <button class="position-relative border-info"><i
                                                                class="bi bi-arrow-right-circle-fill text-info"
                                                            ></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
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




