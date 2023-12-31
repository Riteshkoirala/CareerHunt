<div class="p-2 d-flex justify-content-center text-white" style="background-color: #5294f3">Unlock Your Path to Success:
    Navigate Your Career Hunt with Confidence!. A guidance to the better career.
</div>
@include('contact.contact-model')
<div id="" class="position-sticky fixed-top bg-light d-flex"
     style="height:fit-content; box-shadow: 0px 4px 6px -2px rgba(0, 0, 0, 0.5); width: 100%;">

    <div class="p-4">
        <h1 class="text-dark">
            <img src="{{ asset('/images/img_1.png') }}" style="width: 250px">
        </h1>
    </div>

    <div class="sttext navbar position-relative w-100 mt-5">
        <div class="w-100 text-dark">
            <ul class="d-flex justify-content-evenly list-unstyled">
                <li class="deg">
                    <a href="/">&nbsp;&nbsp;Home&nbsp;&nbsp;</a>
                </li>
                @if(Auth::user())
                <li class="deg">
                    <a href="/recommend">&nbsp;&nbsp;Recommendation&nbsp;&nbsp;</a>
                </li>
                <li class="deg">
                    <a href="{{ route('additional-resource.index') }}">&nbsp;&nbsp;Learn-Grow&nbsp;&nbsp;</a>
                </li>
                <li class="deg">
                    <a href="{{ route('post.index') }}">&nbsp;&nbsp;Discussion&nbsp;&nbsp;</a>
                </li>
                <li class="deg">
                    <a href="{{ route('Assessment.index') }}">&nbsp;&nbsp;Assessment&nbsp;&nbsp;</a>
                </li>
                <li class="deg">
                    <a href="{{ route('cv.index') }}">&nbsp;&nbsp;CV&nbsp;&nbsp;</a>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->is_admin == 1)                    <li>
                        <a href="{{ route('contact.index') }}">&nbsp;&nbsp;Contact&nbsp;&nbsp;</a>
                    </li>
                @else
                    <li class="deg">
                        <a data-bs-toggle="modal" data-bs-target="#contactModel" data-bs-backdrop="static">&nbsp;&nbsp;Contact&nbsp;&nbsp;</a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
    <div class=" w-50 d-flex justify-content-end mt-5" style="">
        @if(Auth::user() == false)
            <a style="float:right; margin-right: 100px" class="d-flex justify-content-between dogg"
               href="{{route('signup')}}"><i class="bi-box-arrow-in-right mt-0" style="font-size: 25px"></i>&nbsp;&nbsp;&nbsp;<span
                    style="font-size: 17px; margin-top: 3px">Login/Signup</span></a>
            {{--        <a style="float:right; margin-right: 15px" class="d-flex justify-content-between dogg" href="{{route('loign')}}"><i class="bi-box-arrow-in-right mt-0" style="font-size: 25px"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 17px; margin-top: 3px">Login</span></a>--}}
        @else
            <style>
                .profile-icon {
                    position: relative;
                    display: inline-block;
                }

                .options {
                    display: none;
                    position: absolute;
                    top: 100%;
                    right: 0;
                    background-color: #f9f9f9;
                    padding: 10px;
                    border: 1px solid #ccc;
                    z-index: 1;
                }

                .profile-icon:hover .options {
                    display: block;
                }

            </style>
            <div class="profile-icon d-flex justify-content-end " style=" margin-right: 140px">
                <p class="greeting">Namaste !! {{ Auth::user()->name }}</p>
                <div class="profile-details">
                    <i class="bi bi-person-circle profile-icon dogg"></i>
                    <div class="options">
                        <a href="{{ route('logout') }}" onclick="return confirm('Are you sure you want to logout?')"
                           class="logout-link">Logout</a>
                        <a href="{{ route('profile.index') }}" class="profile-link">Profile</a>
                    </div>
                </div>
            </div>

        @endif

    </div>
</div>
</div>






