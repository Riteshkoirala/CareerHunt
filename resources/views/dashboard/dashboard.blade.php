<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href=" {{ asset('/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"  crossorigin="anonymous">
    <link href="{{ asset('/style/career.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href=
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Career Hunt</title>
</head>
<body>
<div class="p-2 d-flex justify-content-center text-white" style="background-color: #5294f3">Unlock Your Path to Success: Navigate Your Career Hunt with Confidence!. A guidance to the better career.
</div>

    @include('particles.navbar')
    <div>
    @yield('content')
    </div>

<div style="position: absolute; bottom: 0; width: 100%;">
    @include('particles.footer')
</div>
</body>
</html>
