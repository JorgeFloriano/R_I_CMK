<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/boodstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
    
    <title>Relatório de Inspeção</title>
</head>
<body>
    
    @include('userbar')
    @yield('content')

    <script src="{{asset('assets/boodstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
</body>
</html>