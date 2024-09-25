@extends('layouts.auth_new_login')
@section('title', __('lang_v1.login'))

@section('content')
    <div class="login-16">
        <div class="login-16-inner">
            <div class="container">
                <div class="row login-box">

                    <div class="col-lg-6 align-self-center pad-0 bg-img">
                        <div class="info clearfix">
                            <div class="box">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                 <div class="content" style="background-image: url('{{ asset('uploads/background-login.png') }}');
                                background-repeat: no-repeat;
                                background-size: cover;
                                background-position-y: 100%;">
                                    <h3>CyberSpark POS Software</h3>
                                    <p>
                                        Access Your Point of
                                        Sale
                                        Anytime, Anywhere
                                    </p>

                                </div>
                            </div>
                        </div>
                        
                        <p style="color:yellow; text-align:center; padding-top:20px;"><i class="fas fa-phone-alt"></i> Software Developed By: <a style="color:#034c79; text-decoration: none;" target="_blank"
                        href="https://cybersparkglobal.com/">CyberSpark Global</a><br>
                        Hotline : +01685 375652
                        </p>
                    </div>
                    <div class="col-lg-6 align-self-center pad-0">
                        <div class="form-section align-self-center">
                            <div class="logo">
                                <a href="#">
                                    <img src="{{ asset('uploads/cyberSpark.png') }}" alt="logo">
                                </a>
                            </div>
                           
                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                {{ csrf_field() }}
                                <div class="form-group clearfix">
                                    <div class="form-box">
                                        <input id="username" name="username" type="text" class="form-control"
                                            aria-label="Username" name="username" required autofocus placeholder="Username">
                                        <i class="flaticon-mail-2"></i>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="form-box">
                                        <input name="password" type="password" class="form-control" autocomplete="off"
                                            placeholder="Password" aria-label="Password">
                                        <i class="flaticon-password"></i>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="checkbox form-group clearfix">
                                    <div class="form-check float-start">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberme"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberme">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}"
                                        class="link-light float-end forgot-password">Forgot
                                        your password?</a>
                                </div>
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-primary btn-lg btn-theme w-100">Login</button>
                                </div>
                            </form>

                            <p>Don't have an account? <a href="{{ url('business/register') }}">Register</a></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
    </div>
@endsection
