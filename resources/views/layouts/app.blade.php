<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>الشركة الفلسطينية للعناية بالسيارات</title>
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <style>
        *{
            font-family: 'Tajawal', sans-serif;
        }
    </style>
@stack('css')
</head>
<body>

@yield('page')

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('/js/mdb.js') }}"></script>
@stack('js')
</body>
</html>
