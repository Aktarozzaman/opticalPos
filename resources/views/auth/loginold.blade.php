@extends('layouts.auth_login')
@section('title', __('lang_v1.login'))

@section('content')
    <style>
        .bg-color-g {
            padding: 10px;
            border-radius: 5px;
            color: #0c0c0c;
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 3px 0px 0px 3px;
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
            border: #2ecc71;
        }

        .btn-login:hover {
            background-color: #2ecc71;
        }

        .btn-login:active {
            background-color: #2ecc71 !important;
        }

        .right-col-content {
            z-index: 1;
            /* height: 100%; */
            /* padding-top: 15% !important; */
            /* background-image: linear-gradient(313deg, #cbffe1, #179d50); */
        }

        .fixed-footer {
            /* position: fixed; */
            left: 0;
            bottom: 0;
            padding-top: 20px;
            color: #f3f3f3;

            position: fixed;
            bottom: 0;
            right: 0;

        }

        .fixed-footer a {
            color: #f3f3f3;
        }



        @media only screen and (max-width: 600px) {
            . mobile_hidden {
                display: none !important;
            }

            .fixed-footer {
                padding: 20px;
                word-wrap: break-word;
            }

            .fixed-footer a {
                color: #f3f3f3;
                word-wrap: break-word;
            }

            .mobiled {
                font-size: 10px;
            }


        }

        @media screen and (min-width: 991px) {
            .login-card {
                display: flex;
            }

            .login-image {
                background-image: url('{{ asset('uploads/background-login.png') }}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position-y: 90%;
                position: relative;
            }
        }
    </style>
    <div class="container-fluid">
        <div class="login-form col-md-12 col-xs-12 right-col-content">
            <div class="row login-card"
                style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                <div class="col-md-6 col-lg-8 login-image">
                    <div style="position: absolute; top: 35%; left: 20%">
                        <h6 style="text-align: center; font-family: inherit !important; color: #fff;">Welcome to
                        </h6>
                        <h2
                            style="text-align: center; font-weight: 700; font-family: inherit !important; color: #fff; font-size: 35px;">
                            Cyber Spark POS Software</h2>
                        <h6 style="text-align: center; font-family: inherit !important; color: #fff;">Access Your Point of
                            Sale
                            Anytime, Anywhere
                        </h6>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 bg-color-g">
                    <div style="padding: 28px;">
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
                            <input id="username" type="text" class="form-control" name="username" value=""
                                required autofocus placeholder="@lang('lang_v1.username')">
                            <span class="fa fa-user form-control-feedback"></span>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div style="margin-bottom: 0px;"
                            class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" value=""
                                required placeholder="@lang('lang_v1.password')">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" style="margin-bottom: -16px;">
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
                    </form>
                </div>
            </div>

            @if (config('app.env') != 'demo')
                <div class="row text-center">
                    <div class="col-md-12">

                    </div>
                </div>
            @endif


            <div class="row text-center" style="padding-top: 10px; color:#fff;">
                <div class="col-md-12 col-sm-12 mobiled">
                    <div class="d-flex justify-content-center">
                        <a style="color:#dfbebe;" href="{{ url('business/register') }}" class="mr-3">Don't have an
                            account?
                            Register</a>
                        <a style=" color:#dfbebe;" href="{{ route('password.request') }}">@lang('lang_v1.forgot_your_password')</a>
                    </div>
                </div>
            </div>


        </div>

        @if (config('app.env') == 'demo')
            <div class="col-md-12 col-xs-12" style="padding-bottom: 30px;">
                @component('components.widget', [
                    'class' => 'box-primary',
                    'header' =>
                        '<h4 class="text-center">Demo Shops <small><i> Demos are for example purpose only, this application <u>can be used in many other similar businesses.</u></i></small></h4>',
                ])
                    <!-- Demo buttons go here -->
                @endcomponent
            </div>
        @endif


    </div>


    <div class="fixed-footer">
        <div class="row text-center text_wrap mobiled">

            <span class="mobile_hidden">
                <i class="fas fa-globe"></i> Software Developed By
                <a target="_blank" href="https://www.gloriousit.com/">https://cybersparkglobal.com/</a>&nbsp;
            </span>
            <span>
                <i class="fas fa-phone-alt"></i> Hotline: +01685 375652
            </span>
        </div>
    </div>

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
        });
    </script>
@endsection
