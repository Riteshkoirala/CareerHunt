@extends('dashboard.dashboard')
@section('content')
    <div class="container mt-4 mb-3"  style="box-shadow: 3px 3px 10px 5px lightgrey; background-color: #e1e1e1;">
    <div class="">
        <div class="p-3">
            <h3 class="d-flex justify-content-center fw-bold">COMPLETE YOUR PROFILE</h3><br>
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex mb-3">
                    <div class="d-flex flex-wrap">
                <label for="firstname">Firstname: </label>
                <input type="text" class="form-control" name="firstname" placeholder="john" value="{{ old('firstname')  }}">
                @error('firstname') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="lastname">Lastname: </label>
                <input type="text" class="form-control" name="lastname" placeholder="doe" value="{{ old('lastname') }}">
                @error('lastname') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="location">Location: </label>
                <input type="text" name="location" class="form-control" placeholder="Lagankhel, kathmandu OR Lagenkhel-01, kathmandu" value="{{ old('location') }}">
                @error('location') <span class="text-danger">{{ $message }} </span> @enderror
                        </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="contact_number">Contact Number: </label>
                <input type="text" name="contact_number" class="form-control" placeholder="9812675211" value="{{ old('contact_number') }}">
                @error('contact_number') <span class="text-danger">{{ $message }} </span>@enderror
                    </div>
                </div>
                <div class="d-flex mb-3" style="margin-left:-10px">
                    <div class="d-flex flex-wrap mx-2">
                    <label for="skill">Skills that you have: </label>
                <span style="font-size: 10px" class="mt-1">Note: separate your skills by comma (,)</span>
                        <input type="text" class="form-control" name="skills" placeholder="java, PHP" value="{{ old('skills') }}">
                @error('skills') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="college">College Name: </label>
                <input type="text" name="college_name" class="form-control" placeholder="college" value="{{ old('college_name') }}">
                @error('college') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="image">Current Image: </label>
                <input type="file" accept="image/*" class="form-control" name="image" >
                @error('image') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap mx-2">
                    <label for="cv">CV: </label>
                <input type="file" class="form-control" accept=".doc, .docx, .pdf" name="cv" >
                @error('cv') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex flex-wrap">
                <label for="about">About Yourself: </label>
                <textarea class="ckeditor" name="about" placeholder="Add about you here">{{ old('about') }}</textarea>
                @error('about') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                    <div class="d-flex flex-wrap">
                    <label for="experience">Experience: </label>
                <textarea class="ckeditor" name="experience" placeholder="Add the job Experience here...">{{ old('experience') }}</textarea>
                @error('experience') <span class="text-danger">{{ $message }} </span> @enderror
                    </div>
                </div>
                <br>
                <label for="Education">Education: </label>
                <textarea class="ckeditor" name="education"  placeholder="Add reason here...">{{ old('education') }}</textarea>
                @error('education') <span class="text-danger">{{ $message }} </span>@enderror
                <br>
                <label for="linkedin_link">LinkedIn Url: </label>
                <input type="text" name="linkedin_link" class="form-control" placeholder="linkedln" value="{{ old('linkedin_link') }}">
                @error('linkedin_link') <span class="text-danger">{{ $message }} </span>@enderror
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary " name="submit">Profile Complete</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function () {

            $('.ckeditor').ckeditor();
            $('#experience').ckeditor({
                toolbar: 'Full',
                required: 'required',
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });


        });
    </script>
@stop

