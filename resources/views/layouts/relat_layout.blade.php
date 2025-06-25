<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/boodstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/relatorio.css')}}">
    <script src="{{asset('assets/js/pdf.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style media="print">
        #buttonGroup {
            display: none;
        }
    </style>
    
    <title>Relatório de Inspeção</title>
</head>
<body>
    
    @yield('content')

</body>
</html>