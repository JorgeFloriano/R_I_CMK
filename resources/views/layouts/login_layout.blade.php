<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/boodstrap/bootstrap.min.css')}}">
    <style>
        body {
            background-image: linear-gradient(to left, #a0bddf, #1e3b5d);
        }
        .card {
            padding: 15px;
            border-radius: 15px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.529);
        }
    </style>
    <title>Login</title>
</head>
<body>

    @yield('content')

    <script src="{{asset('assets/boodstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
</body>
</html>