<div id="" class="fixed bg-white" style="height:fit-content; box-shadow: 5px 5px 5px 5px whitesmoke ">
    <div class="p-4">
        <h1 class="text-dark">
            <img src="{{ asset('/images/img_1.png') }}" style="width: 250px">
        </h1>
    </div>
    <div class="d-flex sttext">
    <div class="w-50 text-dark">
        <ul class="d-flex justify-content-evenly list-unstyled">
            <li class="deg" >
                <a href="/">&nbsp;&nbsp;Home&nbsp;&nbsp;</a>
            </li>
            <li class="deg" >
                <a href="/">&nbsp;&nbsp;Recommendation&nbsp;&nbsp;</a>
            </li>
            <li class="deg" >
                <a href="{{ route('disc') }}">&nbsp;&nbsp;Discussion&nbsp;&nbsp;</a>
            </li>
            <li class="deg" >
                <a href="/">&nbsp;&nbsp;CV&nbsp;&nbsp;</a>
            </li>
            <li class="deg" >
                <a href="/">&nbsp;&nbsp;Contact&nbsp;&nbsp;</a>
            </li>
        </ul>
    </div>
    <div class="w-50 ">
            <a style="float:right; margin-right: 100px" class="d-flex justify-content-between logg" href="{{route('loign')}}"><i class="bi-box-arrow-in-right mt-1" style="font-size: 25px"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 17px; margin-top: 3px">Login/Signup</span></a>
        <a style="float:right; margin-right: 15px" class="d-flex justify-content-between dogg" href="{{route('loign')}}"><i class="bi-box-arrow-in-right mt-1" style="font-size: 25px"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 17px; margin-top: 3px">Donate</span></a>

    </div>
    </div>
</div>






