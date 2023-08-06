<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">    <link href="{{ asset('/style/career.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Modal -->
    <link rel="stylesheet" href=
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Login Code</title>
</head>
<body>

<style>
    #hov:hover{
        background-color: darkorange;
    }
</style>

<div class="container align-items-center d-flex justify-content-center" style="width: 100%; height: 100%;">

    <div>
        <div class="p-5 mx-5" style="margin-top: -160px">
            <img src="{{ asset('/images/img_1.png') }}" style="width: 250px">
        </div>
        <div class="p-5 bg-light" style="box-shadow: 0px 0px 10px 5px grey">
            <h2>Confirmation Code</h2>
            <hr>
            <p>Enter te code that has been sent to <span style="font-weight: bold; color: orange">{{ $user->email }}</span></p>
            <form action="{{ route('login-Auth', $user) }}" method="get">
                @csrf

                {{--            <label class="mt-3">6 Digit code</label>--}}
                @if(session('wrong-code'))
                    <div class="alert alert-danger text-danger">
                        <i class="bi bi-emoji-expressionless-fill text-danger"></i>
                        </i>{{ session('wrong-code') }}
                    </div>
                @endif
                @error('otp')
                <div class="alert alert-danger text-danger">
                    <i class="bi bi-emoji-expressionless-fill text-danger"></i>
                    </i>{{ $message }}
                </div>
                @enderror
                <input type="text" name="otp" class="form-control mt-4" style="border: 1px solid black" placeholder="Enter 6 digit code">
                <span>Forgot login code? <a class="text-primary" href="#">Resend code.</a></span>
                <div class="d-flex justify-content-center">
                    <button type="submit" id="hov" class="btn btn-lg text-light dogg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
