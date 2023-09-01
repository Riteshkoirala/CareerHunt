@if ($errors->has('resource_title') || $errors->has('resource-url') || $errors->has('resource-image'))
    <script>
        $(document).ready(function () {
            $('#contactModel').modal('show');
        });
    </script>
@endif
<div class="modal fade" id="resoModel" tabindex="-1" aria-labelledby="resoModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Resource</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3">
                <form action="{{ route('additional-resource.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <div class="d-flex" style="width: 100%">
                        <div class="d-flex flex-wrap">
                            <label>image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}" accept="image/jpeg, image/png, image/jpg">                            <p><span class="text-danger">@error('image') {{ $message }} @enderror</span></p>
                        </div>
                        <div class="d-flex flex-wrap mx-2">
                            <label>Source</label>
                            <input type="text" class="form-control" name="source" value="{{ old('source') }}">
                            <p><span class="text-danger">@error('source') {{ $message }} @enderror</span></p>
                        </div>
                    </div><br>
                    <label>URL<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                    <p><span class="text-danger">@error('url') {{ $message }} @enderror</span></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




