@extends('layouts.auth_login')
@section('title', __('lang_v1.login'))

@section('content')
    <style>
        .bg-color-g {
            padding: 50px;
            width: 38%;
            border-radius: 5px;
            color: #0c0c0c;
            background: rgba(255, 255, 255, 0.55);
            /* box-shadow: 0 8px 32px 0 rgba(78, 78, 78, 0.37); */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 10px 0px 0px 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .form-control {
            padding: 20px 15px;
            border-color: #e3f3fd;
            border-radius: 5px;
            background: #f7fcff;
        }

        .form-control-feedback {
            top: 4px;
        }

        .btn-login {
            padding: 10px 0px !important;
            border-radius: 5px !important;
            background-color: #179d50;
            color: white;
            border: #00aeef;
        }

        .btn-login:hover {
            background-color: #00aeef;
        }

        .btn-login:active {
            background-color: #00aeef !important;
        }

        .right-col-content {
            z-index: 1;
            padding-top: 6% !important;
        }
    </style>
    <div class="login-form col-md-12 col-xs-12 right-col-content">
        <div class="row" style="display: flex; box-shadow: 0 8px 32px 0 rgba(78, 78, 78, 0.37);">
            <div class="col-md-6 col-lg-4 bg-color-g">
                {{-- <p class="form-header text-white">@lang('lang_v1.login')</p> --}}
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('uploads/logo.png') }}" alt="" width="100%">
                </div>
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                        @php
                            $username = old('username');
                            $password = null;
                            if (config('app.env') == 'demo') {
                                $username = 'admin';
                                $password = '123456';
                            
                                $demo_types = [
                                    'all_in_one' => 'admin',
                                    'super_market' => 'admin',
                                    'pharmacy' => 'admin-pharmacy',
                                    'electronics' => 'admin-electronics',
                                    'services' => 'admin-services',
                                    'restaurant' => 'admin-restaurant',
                                    'superadmin' => 'superadmin',
                                    'woocommerce' => 'woocommerce_user',
                                    'essentials' => 'admin-essentials',
                                    'manufacturing' => 'manufacturer-demo',
                                ];
                            
                                if (!empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types)) {
                                    $username = $demo_types[$_GET['demo_type']];
                                }
                            }
                        @endphp
                        <input id="username" type="text" class="form-control" name="username"
                            value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')">
                        <span class="fa fa-user form-control-feedback"></span>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password"
                            value="{{ $password }}" required placeholder="@lang('lang_v1.password')">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                    style="border-radius: 10px">
                                @lang('lang_v1.remember_me')
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">@lang('lang_v1.login')</button>

                    </div>
                    <div class="from-group">
                        @if (config('app.env') != 'demo')
                            <a href="{{ route('password.request') }}" class="pull-right">
                                @lang('lang_v1.forgot_your_password')
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-8"
                style="background-image: url({{ asset('uploads/point-of-sale.png') }}); border-radius: 0px 10px 10px 0px; background-repeat: no-repeat; background-size: contain;background-position-y: 90%;">
                <h2 style="text-align: center; font-weight: 700; font-family: cursive !important; font-size: 35px;">POINT OF
                    SALE</h2>
                <h6 style="text-align: center; font-family: cursive !important;">Access Your Point of Sale Anytime, Anywhere
                </h6>
            </div>
        </div>

        <div class="row" style="text-align: center">
        <br>
            @if (!empty(config('constants.app_title')))
                <p style="padding-left: 35px; color:black"><i class="fas fa-phone-alt"></i>
                    {{ config('constants.app_title') }} <i class="fas fa-globe"></i> Developed By <a target="_blank"
                        href="https://www.gloriousit.com/">www.gloriousit.com</a></p>
            @endif
        </div>
    </div>



    @if (config('app.env') == 'demo')
        <div class="col-md-12 col-xs-12" style="padding-bottom: 30px;">
            @component('components.widget', [
                'class' => 'box-primary',
                'header' =>
                    '<h4 class="text-center">Demo Shops <small><i> Demos are for example purpose only, this application <u>can be used in many other similar businesses.</u></i></small></h4>',
            ])
                <a href="?demo_type=all_in_one" class="btn btn-app bg-olive demo-login" data-toggle="tooltip"
                    title="Showcases all feature available in the application." data-admin="{{ $demo_types['all_in_one'] }}">
                    <i class="fas fa-star"></i> All In One</a>

                <a href="?demo_type=pharmacy" class="btn bg-maroon btn-app demo-login" data-toggle="tooltip"
                    title="Shops with products having expiry dates." data-admin="{{ $demo_types['pharmacy'] }}"><i
                        class="fas fa-medkit"></i>Pharmacy</a>

                <a href="?demo_type=services" class="btn bg-orange btn-app demo-login" data-toggle="tooltip"
                    title="For all service providers like Web Development, Restaurants, Repairing, Plumber, Salons, Beauty Parlors etc."
                    data-admin="{{ $demo_types['services'] }}"><i class="fas fa-wrench"></i>Multi-Service Center</a>

                <a href="?demo_type=electronics" class="btn bg-purple btn-app demo-login" data-toggle="tooltip"
                    title="Products having IMEI or Serial number code." data-admin="{{ $demo_types['electronics'] }}"><i
                        class="fas fa-laptop"></i>Electronics & Mobile Shop</a>

                <a href="?demo_type=super_market" class="btn bg-navy btn-app demo-login" data-toggle="tooltip"
                    title="Super market & Similar kind of shops." data-admin="{{ $demo_types['super_market'] }}"><i
                        class="fas fa-shopping-cart"></i> Super Market</a>

                <a href="?demo_type=restaurant" class="btn bg-red btn-app demo-login" data-toggle="tooltip"
                    title="Restaurants, Salons and other similar kind of shops."
                    data-admin="{{ $demo_types['restaurant'] }}"><i class="fas fa-utensils"></i> Restaurant</a>
                <hr>

                <i class="icon fas fa-plug"></i> Premium optional modules:<br><br>

                <a href="?demo_type=superadmin" class="btn bg-red-active btn-app demo-login" data-toggle="tooltip"
                    title="SaaS & Superadmin extension Demo" data-admin="{{ $demo_types['superadmin'] }}"><i
                        class="fas fa-university"></i> SaaS / Superadmin</a>

                <a href="?demo_type=woocommerce" class="btn bg-woocommerce btn-app demo-login" data-toggle="tooltip"
                    title="WooCommerce demo user - Open web shop in minutes!!" style="color:white !important"
                    data-admin="{{ $demo_types['woocommerce'] }}"> <i class="fab fa-wordpress"></i> WooCommerce</a>

                <a href="?demo_type=essentials" class="btn bg-navy btn-app demo-login" data-toggle="tooltip"
                    title="Essentials & HRM (human resource management) Module Demo" style="color:white !important"
                    data-admin="{{ $demo_types['essentials'] }}">
                    <i class="fas fa-check-circle"></i>
                    Essentials & HRM</a>

                <a href="?demo_type=manufacturing" class="btn bg-orange btn-app demo-login" data-toggle="tooltip"
                    title="Manufacturing module demo" style="color:white !important"
                    data-admin="{{ $demo_types['manufacturing'] }}">
                    <i class="fas fa-industry"></i>
                    Manufacturing Module</a>

                <a href="?demo_type=superadmin" class="btn bg-maroon btn-app demo-login" data-toggle="tooltip"
                    title="Project module demo" style="color:white !important" data-admin="{{ $demo_types['superadmin'] }}">
                    <i class="fas fa-project-diagram"></i>
                    Project Module</a>

                <a href="?demo_type=services" class="btn btn-app demo-login" data-toggle="tooltip"
                    title="Advance repair module demo" style="color:white !important; background-color: #bc8f8f"
                    data-admin="{{ $demo_types['services'] }}">
                    <i class="fas fa-wrench"></i>
                    Advance Repair Module</a>

                <a href="{{ url('docs') }}" target="_blank" class="btn btn-app" data-toggle="tooltip"
                    title="Advance repair module demo" style="color:white !important; background-color: #2dce89">
                    <i class="fas fa-network-wired"></i>
                    Connector Module / API Documentation</a>
            @endcomponent
        </div>
    @endif
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#change_lang').change(function() {
                window.location = "{{ route('login') }}?lang=" + $(this).val();
            });

            $('a.demo-login').click(function(e) {
                e.preventDefault();
                $('#username').val($(this).data('admin'));
                $('#password').val("{{ $password }}");
                $('form#login-form').submit();
            });
        })
    </script>
@endsection
