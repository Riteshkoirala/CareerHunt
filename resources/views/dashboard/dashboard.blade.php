<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('/style/career.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('croppie/croppie.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/snackbar/snackbar.min.js') }}"></script>
    <link href="{{ asset('assets/snackbar/snackbar.min.css') }}" rel="stylesheet">

    <!-- Modal -->
    <link rel="stylesheet" href=
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Career Hunt</title>
</head>
<body>


    @include('particles.navbar')
    <div>
    @yield('content')
    </div>
    @yield('script')
    @include('alerts.snackbar')

<div>
    @include('particles.footer')
</div>
</body>
</html>
