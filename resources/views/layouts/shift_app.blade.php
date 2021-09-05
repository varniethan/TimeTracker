<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{ asset('assets/images/favicon.ico')}}">
    <title>Time Tracker! | </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/nprogress/nprogress.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iCheck/skins/flat/green.css')}}">
    <!-- jQuery custom content scroller -->
    <link rel="stylesheet" href="{{ asset('assets/endors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}">
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-daterangepicker/build/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/cropper/dist/cropper.min.css')}}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css/animate.min.css') }}">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="nav-md footer_fixed">
@yield('content')
<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('assets/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{ asset('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
<!-- SmartWizard -->
<script src="{{ asset('assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
{{--    <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js) }}"></script>--}}
<!-- morris.js -->
<script src="{{ asset('assets/vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/vendors/morris.js/morris.min.js') }}"></script>
<!-- Bootstrap Colorpicker -->
<script src="{{ asset('assets/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- jquery.inputmask -->
<script src="{{ asset('assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- jQuery Knob -->
<script src="{{ asset('assets/vendors/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- Cropper -->
{{--<script src="{{ asset('assets/vendors/cropper/dist/cropper.min.js') }}"></script>--}}
<!-- morris.js -->
<script src="{{ asset('assets/vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/vendors/morris.js/morris.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.my.js') }}"></script>
@yield('scripts')
</body>
</html>
