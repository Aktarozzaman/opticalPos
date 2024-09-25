@extends('layouts.auth_login')
@section('title', __('lang_v1.register'))

<style>
    .business_text {
        font-size: 24px;
        color: #fff;
    }

    .form-header {
        font-size: 18px;
        margin: 8px 0;
    }

    .btn-info {
        padding: 12px 25px !important;
        margin-top: 20px !important;
        font-weight: bold !important;
        color: var(--white-color);
        background-image: linear-gradient(89.97deg, #00a65a 1.84%, #16221b 102.67%) !important;
        background-clip: border-box !important;
        background-size: 200% !important;
        animation: textanim 2s linear infinite !important;
        border: 1px solid #fff !important;
    }

    .btn-info:hover {
        background-image: linear-gradient(89.97deg, #42c376 1.84%, black 102.67%) !important;
    }

    @media only screen and (max-width: 600px) {
        .business_text {
            font-size: 13px;
        }

        .form-header {
            font-size: 13px;
            margin: 5px 0;
        }
    }
</style>

@section('content')
    <div class="container-fluid"
        style="background: rgba(0, 86, 255, 0.6);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(15.7px);
-webkit-backdrop-filter: blur(15.7px);
border: 1px solid rgba(0, 86, 255, 0.84);">
        <div class="login-form col-md-12 col-xs-12 right-col-content-register">
            <div class="row">
                <div class="col-md-12" style="font-size: 18px; font-weight: 600; color:#ebff03">Hotline: +01685 375652
                </div>

            </div>


            <p class="form-header" style="color: #ebff03">@lang('business.register_and_get_started_in_minutes')</p>
            {!! Form::open([
                'url' => route('business.postRegister'),
                'method' => 'post',
                'id' => 'business_register_form',
                'files' => true,
            ]) !!}
            @include('business.partials.register_form')
            {!! Form::hidden('package_id', $package_id) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#change_lang').change(function() {
                window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
            });
        })
    </script>
@endsection
