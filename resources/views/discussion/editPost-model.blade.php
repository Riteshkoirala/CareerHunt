<div class="modal fade" id="exampleE-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleELabel-{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Exiting Post</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3">
                <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') ?? $post->title }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <label>Message</label>
                    <textarea name="message" class="ckeditor form-control" rows="5" cols="50">@if(old('message')) value="{{ old('message') }} @else {{ $post->message }}@endif</textarea>
                    <p><span class="text-danger">@error('message') {{ $message }} @enderror</span></p>
                    <div id="add-attachment-button" class="bg-success rounded p-1 mt-3 mx-2"
                         style="width: fit-content; cursor: pointer; color: white">Add New Attachment
                    </div>
                    <div id="attachment-create">
                        <div class="attachment-item">
                        </div>
                        <p class="text-danger"><span>@error('files') {{ $message }} @enderror</span></p>
                    </div>
                    <div class="mt-2">
                        @foreach($post->postImages as $images)
                                <a href="{{ route('attachment-destroy', $images->id) }}" class="me-2"><i class="bi-trash text-danger"></i></a><a href="{{ asset($images->path) }}" class="text-success" target="_blank">{{ $images->name }}</a>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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




