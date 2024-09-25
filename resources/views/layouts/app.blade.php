@inject('request', 'Illuminate\Http\Request')

@if (
$request->segment(1) == 'pos' &&
($request->segment(2) == 'create' || $request->segment(3) == 'edit' || $request->segment(4) == 'invoice'))
@php
$pos_layout = true;
@endphp
@else
@php
$pos_layout = false;
if ($request->path() == 'pos/invoice') {
$pos_layout = true;
}
@endphp
@endif

@php
$whitelist = ['127.0.0.1', '::1'];
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="{{asset('/uploads/Glorious_IT_famicom_logo_.png')}}" type="image/png" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ Session::get('business.name') }}</title>

    @include('layouts.partials.css')

    @yield('css')

    <style>
        thead tr {
            background-color: #179d50;
            color: white;
        }

        .sidebar-menu {
            background-color: #fffdfd;
        }

        .sidebar-menu.tree a {
            color: #000;
        }

        .buttons-pdf {
            background: rgb(194, 2, 2);
            color: #fff
        }

        .buttons-csv {
            background: rgb(38, 128, 3);
            color: #fff
        }

        .buttons-excel {
            background: rgb(77, 165, 42);
            color: #fff
        }

        .buttons-print {
            background: rgb(10, 88, 190);
            color: #fff
        }

        .buttons-collection {
            background: rgb(190, 106, 10);
            color: #fff
        }

        .skin-blue-light .sidebar-menu>li.active {
            border-left-color: #2ecc71 !important;
        }

        .skin-blue-light .sidebar-menu>li {
            padding: 0px 0;
        }

        .sidebar .sidebar-menu>li>a>i {
            border-radius: 15%;
            width: 30px !important;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            background-color: #ffffff;
            color: #ffffff;
            background-color: #607D8B;
            text-align: center;
            line-height: 30px;
            margin-right: 6px;
        }

        /*.box-primary,
        .box-warning,
        .box-info,
        .box-danger,
        .box-success {
            border-top: 3px solid #179d50 !important;
        }

        .box-title {
            font-weight: 600;
        }

         .treeview>a>i {
            background: #eaeaea;
            border-radius: 50%;
            width: 16% !important;
            height: 30px !important;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: black
        }

        .treeview>.treeview-menu {
            padding-left: 20px
        }

        .skin-blue-light .sidebar-menu>li.active {
            border-left-color: #179d50 !important;
        }

        .btn {
            border-radius: 5px !important;
        }

        .main-header .navbar {
            height: 50px !important;
        }

        .main-header .logo {
            height: 50px;
            line-height: 50px;
        }

        .skin-red .main-header .navbar,
        .skin-red-light .main-header .navbar,
        .skin-red .main-header .logo {
            background: #179d50 !important;
        }

        .main-header .navbar-custom-menu,
        .main-header .navbar-right,
        .main-header .sidebar-toggle {
            height: 50px;
        }

        .main-sidebar.modified-sidebar,
        .treeview-menu {
            background: #fff !important;
        }

        .main-sidebar.modified-sidebar .sidebar .sidebar-menu>li>a {
            color: #435966 !important;
            display: block !important;
            padding: 6.5px 20px !important;
            margin: 4px 0px !important;
            background-color: #ffffff !important;
            border-left: 3px solid transparent !important;
            line-height: 1.3 !important;
        }

        .main-sidebar.modified-sidebar .sidebar .sidebar-menu>li.active>a {
            color: #179d50 !important;
            background: #f7e9e9 !important;
            border-left: 3px solid #179d50 !important;
        } */

        /* .sidebar .sidebar-menu>li>a>i {
            border-radius: 50%;
            width: 30px !important;
            height: 30px !important;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #435966;
            font-size: 18px;
            background-color: #eaeaea;
            text-align: center;
            line-height: 30px;
            margin-right: 15px;

        }

        .sidebar .sidebar-menu>li.active>a>i {
            background: #179d50;
            color: #fff;
        }

        .sidebar .sidebar-menu>li>.treeview-menu {
            background: #fff !important;
        }*/

        .sidebar .sidebar-menu>li>.treeview-menu>li>a {
            /* background: #fff;
            color: #63747c; */
            /* padding: 10px 20px 10px 40px !important; */
        }

        .sidebar .sidebar-menu>li>.treeview-menu>li.active>a {
            /* color: #179d50 !important; */
        }

        .sidebar .sidebar-menu>li>.treeview-menu>li>a:hover {
            font-weight: 600 !important;
            /* color: #179d50 !important; */
        }

        .btn.active.focus {
            outline: none;
        }

        /* .box .box-body {
            padding: 10px 24px !important;
        }

        .highcharts-exporting-group {
            display: none !important;
        }
        
        .navbar-logout-menu{
            width: auto !important;
        } */

        .navbar-logout-menu {
            width: auto !important;
        }

        .navbar-logout-menu .treeview {
            padding: 5px 0;
        }
    </style>

<!--Afiliate marketing code-->
<script>(function(w){w.fpr=w.fpr||function(){w.fpr.q = w.fpr.q||[];w.fpr.q[arguments[0]=='set'?'unshift':'push'](arguments);};})(window);
    fpr("init", {cid:"b8eidbqz"}); 
    fpr("click");
    </script>
    <script src="https://cdn.firstpromoter.com/fpr.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    @stack('css')
</head>

<body class="@if ($pos_layout) hold-transition lockscreen @else hold-transition skin-@if (!empty(session('business.theme_color'))){{ session('business.theme_color') }}@else{{ 'blue-light' }} @endif sidebar-mini @endif">
    <div class="wrapper thetop">
        <script type="text/javascript">
            if (localStorage.getItem("upos_sidebar_collapse") == 'true') {
                var body = document.getElementsByTagName("body")[0];
                body.className += " sidebar-collapse";
            }
        </script>
        @if (!$pos_layout)
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
        @else
        @include('layouts.partials.header-pos')
        @endif

        @if (in_array($_SERVER['REMOTE_ADDR'], $whitelist))
        <input type="hidden" id="__is_localhost" value="true">
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="@if (!$pos_layout) content-wrapper @endif">
            <!-- empty div for vuejs -->
            <div id="app">
                @yield('vue')
            </div>
            <!-- Add currency related field-->
            <input type="hidden" id="__code" value="{{ session('currency')['code'] }}">
            <input type="hidden" id="__symbol" value="{{ session('currency')['symbol'] }}">
            <input type="hidden" id="__thousand" value="{{ session('currency')['thousand_separator'] }}">
            <input type="hidden" id="__decimal" value="{{ session('currency')['decimal_separator'] }}">
            <input type="hidden" id="__symbol_placement" value="{{ session('business.currency_symbol_placement') }}">
            <input type="hidden" id="__precision" value="{{ config('constants.currency_precision', 2) }}">
            <input type="hidden" id="__quantity_precision" value="{{ config('constants.quantity_precision', 2) }}">
            <!-- End of currency related field-->

            @if (session('status'))
            <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
            @endif
            @yield('content')

            <div class='scrolltop no-print'>
                <div class='scroll icon'><i class="fas fa-angle-up"></i></div>
            </div>

            @if (config('constants.iraqi_selling_price_adjustment'))
            <input type="hidden" id="iraqi_selling_price_adjustment">
            @endif

            <!-- This will be printed -->
            <section class="invoice print_section" id="receipt_section">
            </section>

        </div>
        @include('home.todays_profit_modal')
        <!-- /.content-wrapper -->

        @if (!$pos_layout)
        @include('layouts.partials.footer')
        @else
        @include('layouts.partials.footer_pos')
        @endif

        <audio id="success-audio">
            <source src="{{ asset('/audio/success.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/success.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>
        <audio id="error-audio">
            <source src="{{ asset('/audio/error.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/error.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>
        <audio id="warning-audio">
            <source src="{{ asset('/audio/warning.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/warning.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>
    </div>

    @if (!empty($__additional_html))
    {!! $__additional_html !!}
    @endif

    @include('layouts.partials.javascripts')

    <div class="modal fade view_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>

    @if (!empty($__additional_views) && is_array($__additional_views))
    @foreach ($__additional_views as $additional_view)
    @includeIf($additional_view)
    @endforeach
    @endif

    {{-- <script>
        function displayTime() {
            var date = new Date();
            document.getElementById("clock").innerHTML = date.toLocaleTimeString();
        }
        setInterval(displayTime, 1000);
    </script> --}}
    @stack('js')
</body>

</html>