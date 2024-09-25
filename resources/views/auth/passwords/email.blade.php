@extends('layouts.auth2')
@section('title', __('lang_v1.reset_password'))

@section('content')
    <style>
        .bg-color-g {
            padding: 50px;
            width: 38%;
            border-radius: 5px;
            color: #0c0c0c;
            background: rgba(255, 255, 255, 0.55);
            box-shadow: 0 8px 32px 0 rgba(78, 78, 78, 0.37);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 10px;
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
        }
    </style>
    <div class="login-form col-md-12 col-xs-12 right-col-content">

        <div class="row">
            <div class="col-md-3 col-lg-4"></div>
            <div class="col-md-6 col-lg-4 bg-color-g">
                {{-- <p class="form-header text-white">@lang('lang_v1.login')</p> --}}
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('uploads/logo.png') }}" alt="" width="100%">
                </div>
                <form  method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                     <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="@lang('lang_v1.email_address')">
                        <span class="fa fa-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            @lang('lang_v1.send_password_reset_link')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

