@if ($errors->has('contact_fullname') || $errors->has('contact_message') || $errors->has('contact_email'))
    <script>
        $(document).ready(function () {
            $('#contactModel').modal('show');
        });
    </script>
@endif
<div class="modal fade" id="contactModel" tabindex="-1" aria-labelledby="contactModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Contact US</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3">
                <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Full Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="contact_fullname" value="{{ old('contact_fullname') }}">
                    <p><span class="text-danger">@error('contact_fullname') {{ $message }} @enderror</span></p>
                    <div class="d-flex" style="width: 100%">
                        <div class="d-flex flex-wrap">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}">
                            <p><span class="text-danger">@error('contact_email') {{ $message }} @enderror</span></p>
                        </div>
                        <div class="d-flex flex-wrap mx-2">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact_numbers" value="{{ old('contact_numbers') }}">
                            <p><span class="text-danger">@error('contact_numbers') {{ $message }} @enderror</span></p>
                        </div>
                    </div>
                    <label class="mt-2">Message<span class="text-danger">*</span></label>
                    <textarea name="contact_message" class="form-control" rows="5" cols="50">{{ old('contact_message') }}</textarea>
                    <p><span class="text-danger">@error('contact_message') {{ $message }} @enderror</span></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




