@extends('dashboard.dashboard')
@section('content')
    @include('cv.crop')
    <div class="container d-block  p-3 mt-4 mb-4" style="background-color: #dcdbdb">
        <h2 class="text-center">Fill in the necessary field for the cv</h2>
        <form action="{{ route('cv.store') }}" method="post">
            @csrf
            <div class="image-details-container border rounded p-4">
                <div class="d-flex flex-wrap ">
                    <div class="form-outline mb-4">
                        <h4 class="form-label" for="image">Image: </h4>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control"/>
                        <p class="text-red">@error('image') {{ $message }} @enderror</p>
                    </div>

                    <input type="hidden" name="cropped_image_name" id="cropped-image-name">
                    <div id="cropped" class="d-none mx-5">
                        <div class="d-flex justify-content-center align-center">
                            <img id="cropped-image"  style="height: 10rem !important;">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end" style="margin-top: -140px">
                    <img class="me-4" src="{{ asset('storage/cv/'.$cvData->image_name) }}" alt="cv image" height="100px" width="100px">
                </div>
            </div>
            <div class="personal-details-container border rounded p-4 mt-2">
                <h4 class="mb-3">Personal Details:</h4>
                <input type="hidden" name="user_id" value="1">
                <div class="d-flex justify-content-evenly">
                    <div class="col-md-4">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" value="{{ $cvData->fullname }}"  name="fullname" placeholder="Full Name">
                    </div>
                    <div class="col-md-4 mx-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $cvData->email }}" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-4 mx-1">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="number" name="contact_number" value="{{ $cvData->contact_number }}" placeholder="Phone Number">
                    </div>
                </div>
                <div class="d-flex justify-content-evenly">
                    <div class="col-md-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address" value="{{ $cvData->location }}" name="location">
                    </div>
                    <div class="col-md-4 mx-1">
                        <label for="linkedin_link" class="form-label">LinkedIn Profile</label>
                        <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $cvData->linkedin_link }}" placeholder="LinkedIn Profile">
                    </div>
                    <div class="col-md-4 mx-1">
                        <label for="github_link" class="form-label">GitHub Profile</label>
                        <input type="url" class="form-control" id="github_link" name="github_link" value="{{ $cvData->github_link }}" placeholder="GitHub Profile">
                    </div>
                </div>
            </div>


            <div class="highlight-details-container border rounded p-4 mt-2">
                <h4 >Highlights:</h4><span style="font-size: 15px">(Note: separate the skills and language by comma (,))</span><br><br>
                <div class="d-flex flex-wrap">
                    <label class="mx-2">Skill: </label>
                    <input type="text" class="form-control mx-2 mt-1" name="skills" value="{{ $cvData->skills }}" placeholder="Java, PHP">
                    <label class="mx-2">Language: </label>
                    <input type="text" class="form-control mx-2 mt-1" name="language" value="{{ $cvData->language }}" placeholder="Nepali, English">
                    <label class="mx-2">Job Title: </label>
                    <input type="text" class="form-control mx-2 mt-1" name="title" value="{{ $cvData->title }}" placeholder="Nepali, English">
                </div>
            </div>
            <div class="d-flex flex-wrap"><div class="flex-row">
                    <h4 class="mt-4">Objective/Summary:</h4>
                    <div class="d-flex flex-wrap">
                        <textarea id="addEdit"  class="ckeditor" name="objective" placeholder="write what u are and what are you searching for.">{!! $cvData->objective !!}</textarea>
                    </div>
                </div>
                <div class="flex-row mx-3">
                    <h4 class="mt-4">Education:</h4>
                    <div class="d-flex flex-wrap">
                        <textarea id="addEdit" class="ckeditor" name="education" placeholder="write what u are and what are you searching for.">{!! $cvData->education !!}</textarea>
                    </div>
                </div>

            </div>
            <div class="d-flex flex-wrap"><div class="flex-row">
                    <h4 class="mt-4">Experience:</h4>
                    <div class="d-flex flex-wrap">
                        <textarea id="addEdit"  class="ckeditor" name="experience" placeholder="write what u are and what are you searching for.">{!! $cvData->experience !!}</textarea>
                    </div>
                </div>
                <div class="flex-row mx-3">
                    <p class="mt-4">Projects:</p>
                    <div class="d-flex flex-wrap">
                        <textarea id="addEdit" class="ckeditor" name="projects" placeholder="write what u are and what are you searching for.">{!! $cvData->projects !!}</textarea>
                    </div>
                </div>

            </div>
            <h4 class="mt-4">certification/Training:</h4>
            <div class="d-flex flex-wrap">
                <textarea id="addEdit" class="ckeditor" name="certification_training" placeholder="write what u are and what are you searching for.">{!! $cvData->certification_training !!}</textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success">Save</button>
                <a href="{{ route('preview.pdf') }}" target="_blank" class="btn btn-primary mx-3">Preview</a>
            </div>
        </form>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {

            $('.ckeditor').ckeditor();
        });
    </script>

@endsection

@section('script')
    <script src="{{asset('croppie/croppie.min.js')}}"></script>
    <script src="{{asset('croppie/cropscript.js')}}"></script>
    <script>
        ///viewport ,boundary and enable Resize is inside crop script.js
        input.addEventListener('change', function () {
            $('#exampleModalCenter').modal('show');
            cropChangeHandler({
                viewport: {width: 400, height: 400},
                boundary: {width: 450, height: 450},
            })
        })

    </script>
@endsection
