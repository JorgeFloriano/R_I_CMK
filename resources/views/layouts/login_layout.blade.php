<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/boodstrap/bootstrap.min.css')}}">
    <style>
        body {
            background-image: linear-gradient(to left, #5f81a8, #0e2846);
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

    <div class="text-center my-2 text-white">
        <small>Created by Jorge Luis &copy; {{date('Y')}}</small>
    </div>

    <script src="{{asset('assets/boodstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
</body>
</html>