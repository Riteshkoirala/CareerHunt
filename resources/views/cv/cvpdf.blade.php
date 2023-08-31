<link href="{{ asset('/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
<link href="{{ asset('/style/career.css') }}" rel="stylesheet">
<style>
    *{
        background-color: lightgrey;
    }
    .des{
        background-color: orange;
        width: 100%;
        height: fit-content;
        padding: 5px;
        text-align: center;
        margin-right: 20px;
        margin-top:20px ;
    }
    .fes{
        padding: 15px;
        margin-top: 20px;
        margin-right: 10px;
        margin-left: 10px;
    }
    .des h2{
        background-color: orange;
    }
    .des p{
        background-color: orange;
    }
    .column {
        padding: 10px;
    }

    .column-20 {
        flex: 10%;
    }

    .column-80 {
        flex: 90%;
    }
    @media print {
        #printButton {
            display: none;
        }
    }
</style>
<div class="container mb-3 p-2 bg-light" style="width: 900px">
    <div  style="width: 100%">
        @if($cvData->image_name != null)

        <div class="d-flex">
            <div class="fes">
                <img src="{{ asset('images/img_1.png') }}" width="150px" height="150px">
            </div>
            <div style="width: 100%">
<div class="des">
    <h2>{{ $cvData->fullname }}</h2>
    <p>{{ $cvData->title }}</p>
</div>
                @if($cvData->objective != null)

    <div class="p-4" style="width: 100%;">
        <h4 style="font-weight: bold">Objective</h4>
        <pre class="parag">{!! $cvData->objective !!}</pre>
        <hr style="border: 1px solid blue; color: blue">
    </div>
                @endif

            </div>
        </div>
        @endif

            <div class="des">
                <h2>{{ $cvData->fullname }}</h2>
                <p>{{ $cvData->title }}</p>
            </div>
            @if($cvData->objective != null)
            <div class="p-4" style="width: 100%;">
                <h4 style="font-weight: bold">Objective</h4>
                <p class="parag">{!! $cvData->objective !!}</p>
                <hr style="border: 1px solid blue; color: blue">
            </div>
            @endif
        <div class="d-flex" style="margin-top: -30px">
        <div class="column column-20 p-4">
            @if($cvData->contact_number != null)
            <span style="font-weight: bold">Phone:</span><p>{{ $cvData->contact_number }}</p>
            @endif
                @if($cvData->email != null)
                <span style="font-weight: bold">Email:</span><p>{{ $cvData->email }}</p>
                @endif
                @if($cvData->address != null)
                <span style="font-weight: bold">Address:</span><p>{{ $cvData->address }}</p>
                @endif
                @if($cvData->linkedin_link != null)
                <span style="font-weight: bold">LinkedIN:</span><p>{{ $cvData->linkedin_link }}</p>
                @endif
                @if($cvData->github_link != null)
                <span style="font-weight: bold">GitHub:</span><p>{{ $cvData->github_link }}</p>
                @endif

                @if($cvData->skills != null)
            <h4 style="font-weight: bold">Skill Highlights</h4>
            <hr>

            <ul>
                <li>
                    Java
                </li>
                <li>
                    PHP
                </li>
            </ul>
                @endif
                @if($cvData->language != null)

                <h4 style="font-weight: bold">Language</h4>
            <hr>

            <ul>
                <li>
                    English
                </li>
                <li>
                    Nepali
                </li>
            </ul>
                @endif
        </div>
        <div class="column column-80 bg-light p-4">
            @if($cvData->experience != null)
            <h4 class="bg-light fw-bold">Experience</h4>
            <hr>
            <p class="bg-light">{!!$cvData->experience !!}</p>
            @endif
            @if($cvData->education != null)
                    <h4 class="bg-light fw-bold">Education</h4>
            <hr>
            <p class="bg-light">{!! $cvData->education !!}</p>
                @endif
                @if($cvData->projects != null)
                <h4 class="bg-light fw-bold">Projects</h4>
            <hr>
            <p class="bg-light">{!! $cvData->projects !!}</p>
                @endif
                @if($cvData->certification_training != null)
                <h4 class="bg-light fw-bold">Certification/Training</h4>
            <hr>
            <p class="bg-light">{!! $cvData->certification_training !!}</p>
                @endif
        </div>
        </div>
    </div>
</div>

    </div>
        <button id="printButton">Print Page</button>
    </div>
</div>

<script>
    function printPage() {
        window.print();
    }

    document.getElementById("printButton").addEventListener("click", printPage);
</script>
