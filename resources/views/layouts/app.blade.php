<!DOCTYPE html>
<html lang="ar" dir="rtl">
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
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <style>
        *{
            font-family: 'Tajawal', sans-serif;
        }
    </style>
@stack('css')
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light white">

    <div class="container flex-row-reverse">

        <a class="navbar-brand" href="#">
            LOGO
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse flex-row-reverse" id="basicExampleNav">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#" target="_blank">Link </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#" target="_blank">Link </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#" target="_blank">Link </a>
                </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link waves-effect"
                       target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://mdbootstrap.com/docs/jquery/newsletter/"
                       class="nav-link border border-light rounded waves-effect mr-2" target="_blank">
                        <i class="fas fa-envelope mr-1"></i>Newsletter
                    </a>
                </li>
            </ul>

        </div>

    </div>

</nav>
<!--/.Navbar-->

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
<script type="text/javascript" src="{{ asset('/js/dash.js') }}"></script>
@stack('js')
</body>
</html>
