<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h3>Add New Exiting Post</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3 text-dark">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <label>Message</label>
                    <textarea name="message" class="ckeditor form-control" rows="5" cols="50">{{ old('message') }}</textarea>
                    <p><span class="text-danger">@error('message') {{ $message }} @enderror</span></p>
                    <div id="add-attachment-button-1" class="bg-success rounded p-1 mt-3 mx-2"
                         style="width: fit-content; cursor: pointer; color: white">Add New Attachment
                    </div>
                    <div id="attachment-create-1">
                        <div class="attachment-item-1">
                        </div>
                        <p class="text-danger"><span>@error('files') {{ $message }} @enderror</span></p>
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

        $('#add-attachment-button-1').on('click',function () {
            console.log('what');
            // Create a new file input element
            let deleteButton = $('<label class="delete-button mt-2 mr-2 bg-warning p-1"><i class="bi-trash text-danger mt-5"></label>');
            let newInput = $('<input type="file" class="form-control mt-2" style="background-color:darkgrey; color: white" name="files[]">');
            let newAttachmentItem = $('<div class="attachment-item d-flex justify-content-between text-black"></div>');
            newAttachmentItem.append(deleteButton, newInput);
            $('#attachment-create-1').append(newAttachmentItem);
            deleteButton.click(function () {
                newAttachmentItem.remove(); // Remove the corresponding attachment item
            });
            $('.ckeditor').ckeditor();
            $('#message').ckeditor({
                toolbar: 'Full',
                required: 'required',
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    });

</script>




