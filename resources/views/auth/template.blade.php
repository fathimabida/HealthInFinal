<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-07/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Mar 2024 03:19:52 GMT -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/owl.carousel.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
    <title>{{ $title }}</title>

</head>

<body>
    <div class="content d-flex align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="d-flex flex-row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('/') }}images/vector-health.png" alt="Image" class="img-fluid">
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('/') }}js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/') }}js/popper.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>

</body>



</html>
