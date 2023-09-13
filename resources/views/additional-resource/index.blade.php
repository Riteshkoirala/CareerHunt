@extends('dashboard.dashboard')
@section('content')
    @if ($errors->has('title') || $errors->has('url') || $errors->has('image'))
        @if (old('addRes'))
            <script>
                var ll = '#editResoModel-' +{{ old('addRes') }}
                    console.log(ll);
                $(document).ready(function () {
                    $(ll).modal('show');
                });
            </script>
        @else
    <script>
        $(document).ready(function () {
            $('#resoModel').modal('show');
        });
    </script>
        @endif
    @endif

    @include('additional-resource.add-model')
    <div class="d-flex">
        <div class="listing">
            @if(Auth::user()->is_admin == 1)
            <div class="p-3">
                <a data-bs-toggle="modal" data-bs-target="#resoModel" data-bs-backdrop="static" class="btn btn-primary">Add
                    new Resource</a>
            </div>
            @endif
            <hr>
            <div class="p-3">
                <h6>Learning Platform</h6>
                <ul>
                    <li>
                        <i class="bi bi-youtube bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.youtube.com" target="_blank" class="text-light">Youtube</a>
                    </li>
                    <li>
                        <i class="bi bi-coursera bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.coursera.com" target="_blank" class="text-light">Coursera</a>
                    </li>
                    <li>
                        <i class="bi bi-edx bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.edx.org" target="_blank" class="text-light">Edx</a>
                    </li>
                    <li>
                        <i class="bi bi-edx bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.simplilearn.com" target="_blank" class="text-light">Simple Learn</a>
                    </li>
                    <li>
                        <i class="bi bi-edx bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.udemy.com" target="_blank" class="text-light">Udemy</a>
                    </li>
                    <li>
                        <i class="bi bi-edx bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.udacity.com" target="_blank" class="text-light">Udacity</a>

                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.khanacademy.org" target="_blank" class="text-light">Khan Academy</a>
                    </li>
                </ul>
                <hr>
                <h6>Famous Company Offering Course</h6>
                <ul>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://grow.google/intl/uk/#filter" target="_blank" class="text-light">Google Digital Garage</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.redhat.com/en" target="_blank" class="text-light">Red Hat</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://aws.amazon.com/training/" target="_blank" class="text-light">Amazon Training</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://learn.microsoft.com/en-us/" target="_blank" class="text-light">Microsoft Learn</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.linkedin.com/learning/" target="_blank" class="text-light">Linkedin Learning</a>
                    </li>
                </ul>
                <hr>
                <h6>Hackathon Platform</h6>
                <ul>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://devpost.com/" target="_blank" class="text-light">Dev Post</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.hackerearth.com/" target="_blank" class="text-light">Hacker Earth</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.topcoder.com/" target="_blank" class="text-light">Top Coder</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://angelhack.com/" target="_blank" class="text-light">Angel Hack</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://mlh.io/" target="_blank" class="text-light">Major League Hacking</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://codeforces.com/" target="_blank" class="text-light">Codeforces</a>
                    </li>
                    <li>
                        <i class="bi bi-academy bg-light" style="color: #ff0000; border-radius: 10px"></i>&nbsp;<a href="https://www.kaggle.com/" target="_blank" class="text-light">Kaggle</a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="maintain">
            <div class=" bg-light m-3 d-block  p-3 glower">
                <div class="language-details-container p-2">
                    <div class="d-flex ">
                        @php
                            $resourcesCount = count($resources);
                            $resourcesPerRow = 3;
                        @endphp

                        @for ($i = 0; $i < $resourcesCount; $i += $resourcesPerRow)
                            <div class="row justify-content-evenly">
                                @foreach($resources as $resource)
                                @if ($i < $resourcesCount)
                                        @include('additional-resource.edit-model')
                                        <div class="course col-md-3 d-flex flex-wrap justify-content-center mx-2 mt-2"><a href="{{ $resource->url }}" target="_blank">
                                                <div class="d-flex justify-content-center" style="width: 100%">
                                            <img src="{{ asset('images/resource/'.$resource->image) }}" alt="Your Image">
                                                    <div>
                                                    <div class="place">
                                                        <div class="justify-content-end">
                                                    <div class="ellipsis">...</div>
                                                        </div>
                                                    <div class="options">
                                                        <a data-bs-toggle="modal" data-bs-target="#editResoModel-{{ $resource->id }}" data-bs-backdrop="static" class="edit">Edit</a>
                                                        @php
                                                            $additionalResource = $resource;
                                                        @endphp
                                                        <form action="{{ route('additional-resource.destroy',$additionalResource) }}" onclick="return confirm('Are you sure u wan to delete')" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        <button class="delete">Delete</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div>
                                                <hr>
                                                <p>Title: {{ $resource->title }}</p>
                                                <p>Source: {{ $resource->source }}</p>
                                            </div></a>
                                        </div>
                                    @endif
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                        @endfor
                    </div>


                </div>
            </div>
        </div>
    </div>

@stop

