<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="uploads/Glorious_IT_famicom_logo_.png" type="image/png" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'POS') }}</title>

    @include('layouts.partials.css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
    .service_link {
        text-decoration: none;
        cursor: pointer;
        z-index: 10;
        position: absolute;
        top: 20px;
        left: 10%;
        color: 004d7a;
        font-weight: 500;
        transition: 2ms
    }

    .service_link:hover {
        color: #2ecc71;
    }

    .service_link:active {
        color: #2ecc71 !important;
    }
</style>

<body
    style="background-image: url({{ asset('uploads/background_pos.png') }}); background-size: contain; background-position-y: bottom; background-repeat: no-repeat;">

    @inject('request', 'Illuminate\Http\Request')
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}"
            data-msg="{{ session('status.msg') }}">
    @endif

    <div class="container-fluid">
        <div style="position: absolute; top: 0; right: 20px; z-index:10;">
            <select class=" from input-sm" id="change_lang" style="margin: 10px; ">
                @foreach (config('constants.langs') as $key => $val)
                    <option value="{{ $key }}" @if ((empty(request()->lang) && config('app.locale') == $key) || request()->lang == $key) selected @endif>
                        {{ $val['full_name'] }}
                    </option>
                @endforeach
            </select>
        </div>


        {{-- <a class="service_link"
            href="{{ action('\Modules\Repair\Http\Controllers\CustomerRepairStatusController@index') }}">
            @lang('repair::lang.repair_status')
        </a> --}}



        <div class="row eq-height-row">

            {{-- company name --}}
            <div style=" position: fixed; bottom: 30px; ; right: 60px; z-index:100">
                <a href="/">
                    @if (file_exists(public_path('uploads/logo.png')))
                        <img src="{{ asset('uploads/logo.png') }}" class="img-rounded" alt="Logo" width="250">
                    @else
                        {{ config('app.name', 'gloriousPOS') }}
                    @endif
                </a>
                <br />
                @if (!empty(config('constants.app_title')))
                    <p style="padding-left: 35px; color:black">Hotline : {{ config('constants.app_title') }} <br>Website
                        : <a target="_blank" href="https://www.gloriousit.com/">www.gloriousit.com</a></p>
                @endif
            </div>
           

        </div>

        @yield('content')
    </div>


    @include('layouts.partials.javascripts')

    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>

    @yield('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2_register').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
