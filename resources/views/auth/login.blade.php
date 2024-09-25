@extends('layouts.auth_optical')
@section('title', __('lang_v1.login'))

@section('content')

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                @include('auth.partials.login')
{{--                @include('auth.partials.registration')--}}
            </div>
        </div>
        <div class="panels-container">

            <div class="panel left-panel">
                <div class="content">
                    <h3>CYBERSPARK POS SOFTWARE</h3>
                    <p>Access Your Point of Sale Aytime, Anywhere</p>
                    <button class="btn transparent" id="sign-up-btn" href=" {{ url('business/register') }}">Sign Up</button>
                </div>
                <img src="{{ asset('images/login_cyberspark_logo.png') }}" class="image" alt="">
            </div>

{{--            <div class="panel right-panel">--}}
{{--                <div class="content">--}}
{{--                    <h3>CYBERSPARK POS SOFTWARE</h3>--}}
{{--                    <p>Access Your Point of Sale Aytime, Anywhere</p>--}}
{{--                    <button class="btn transparent" id="sign-in-btn">Sign In</button>--}}
{{--                </div>--}}
{{--                <img src="{{ asset('images/login_cyberspark_logo.png') }}" class="image" alt="">--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
