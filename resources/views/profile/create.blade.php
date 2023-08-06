@extends('dashboard.dashboard')
@section('content')
    <div class="container bg-light mt-4 mb-3"  style="box-shadow: 3px 3px 10px 5px lightgrey">
    <div class="contai">
        <div class="job_container">
            <h3 class="d-flex justify-content-center">COMPLETE YOUR PROFILE</h3><br>
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="firstname">Firstname: </label>
                <input type="text" name="firstname" placeholder="john" value="{{ old('firstname')  }}">
                @error('firstname') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="lastname">Lastname: </label>
                <input type="text" name="lastname" placeholder="doe" value="{{ old('lastname') }}">
                @error('lastname') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="location">Location: </label>
                <input type="text" name="location" placeholder="Lagankhel, kathmandu OR Lagenkhel-01, kathmandu" value="{{ old('location') }}">
                @error('location') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="contact_number">Contact Number: </label>
                <input type="text" name="contact_number" placeholder="9812675211" value="{{ old('contact_number') }}">
                @error('contact_number') <span class="text-danger">{{ $message }} </span>@enderror
                <br><br>
                <label for="skill">Skills that you have: </label><br>
                <span style="font-size: 10px">Note: separate your skills by comma (,)</span>
                        <input type="text" name="skills" value="{{ old('skills') }}">
                @error('skills') <span class="text-danger">{{ $message }} </span> @enderror

                <br><br>
                <label for="college">College Name: </label>
                <input type="text" name="college_name" placeholder="college" value="{{ old('college_name') }}">
                @error('college') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="image">Current Image: </label>
                <input type="file" accept="image/*" name="image" >
                @error('image') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="cv">CV: </label>
                <input type="file" accept=".doc, .docx, .pdf" name="cv" >
                @error('cv') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="about">About Yourself: </label>
                <textarea class="ckeditor" name="about" placeholder="Add about you here">{{ old('about') }}</textarea>
                @error('about') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="experience">Experience: </label>
                <textarea class="ckeditor" name="experience" placeholder="Add the job Experience here...">{{ old('experience') }}</textarea>
                @error('experience') <span class="text-danger">{{ $message }} </span> @enderror
                <br><br>
                <label for="Education">Education: </label>
                <textarea class="ckeditor" name="education" placeholder="Add reason here...">{{ old('education') }}</textarea>
                @error('education') <span class="text-danger">{{ $message }} </span>@enderror
                <br><br>
                <label for="linkedin_link">LinkedIn Url: </label>
                <input type="text" name="linkedin_link" placeholder="linkedln" value="{{ old('linkedin_link') }}">
                @error('linkedin_link') <span class="text-danger">{{ $message }} </span>@enderror
                <br><br>

                <button type="submit" name="submit">Profile Complete</button>
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

