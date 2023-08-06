<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">    <link href="{{ asset('/style/career.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Modal -->
    <link rel="stylesheet" href=
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="d-flex justify-content-center">
<div class="container">
            {{-- Insert your logo using the public_path() helper --}}
            @php
                $logoPath = public_path('/images/img_1.png');
            @endphp
            <img src="{{ $message->embed($logoPath) }}" alt="Logo" style="max-width: 200px; display: block; margin: 0 auto;">

            <p style="font-size: 15px; margin-top: 20px;">Dear {{ $email }},</p>
            <p style="font-size: 18px;">Your Login Code is <span style="font-weight:bold; font-size: 25px; border: 1px darkblue; background-color: whitesmoke">{{ $randomNumber }}</span></p>

                        <a href="http://localhost/login" style="display: inline-block; background-color: #000; color: white; text-decoration: none; font-size: 15px; padding: 10px 20px; border-radius: 2px;">Login Now</a>
</div>
</div>
{{-- Optional footer content --}}
<div style="margin-top: 40px;">
    <p style="font-size: 12px; color: #888;">© {{ date('Y') }} Your Company. All rights reserved.</p>
</div>
</body>
</html>
