<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin panel</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('admins/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->

    <link href="{{asset('admins/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('admins/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admins/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('admins/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Custom Css -->
    <link href="{{asset('admins/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admins/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-black">
<!-- Page Loader -->
<div class="page-loader-wrapper warning">
    <div class="loader ">
        <div class="preloader">
            <div class="spinner-layer pl-black">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('admin.home')}}">Market</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">

        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    @include('admins.layouts.navbar')
    <!-- #END# Left Sidebar -->
</section>

<section class=" content">
    @yield('content')
</section>

<!-- Jquery Core Js -->
<script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('admins/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('admins/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('admins/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('admins/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('admins/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('admins/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admins/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('admins/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('admins/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('admins/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admins/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admins/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('admins/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('admins/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('admins/js/admin.js')}}"></script>
<script src="{{asset('admins/js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('admins/js/demo.js')}}"></script>
<script src="https://use.fontawesome.com/a96cf2e01d.js"></script>
</body>

</html>
