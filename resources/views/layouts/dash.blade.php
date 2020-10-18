<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> لوحة التحكم | @stack('title')</title>
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
    <div class="container">
        <a class="navbar-brand" href="/admin">
            <span class="mdi mdi-speedometer"></span>
            لوحة التحكم
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders') }}">
                        <span class="mdi mdi-clipboard-list-outline"></span>
                        الطلبات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bundles.index') }}">
                        <span class="mdi mdi-package-variant-closed"></span>
                        الباقات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.index') }}">
                        <span class="mdi mdi-car-multiple"></span>
                        انواع السيارات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="document.getElementById('logout_form').submit()">
                        <span class="mdi mdi-logout"></span>
                        تسجيل الخروج
                    </a>
                    <form action="{{ route('logout') }}"  method="post" id="logout_form">@csrf</form>
                </li>
            </ul>
            <!-- Links -->

        </div>
        <!-- Collapsible content -->

    </div>

</nav>
<!--/.Navbar-->
@yield('page')

<!-- Don't Remove (Will disable the app) -->
<div class="fixed-bottom text-center bg-dark white-text">
    <div class="container">
        Powered By
        <a target="_blank" href="https://uni-devs.tech" class="red-text">
            <img src="https://uni-devs.tech/img/logo2.png" style="height: 30px" alt="">
            UniDevs
        </a>
    </div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
<!-- MDB core JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript" src="{{ asset('/js/mdb.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dash.js') }}"></script>
@stack('js')
</body>
</html>
