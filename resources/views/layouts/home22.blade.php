<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owlcarousel/assets/owl.theme.default.min.css') }}">

    {{-- AOS Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <!-- Styles -->
    <style>
        body {
            min-height: 100vh;
            background-color: #ffffff;
            color: #020202;
            background-size: contain;
            background-position-y: bottom;
            background-repeat: no-repeat;
        }

        .navbar-default {
            background-color: transparent;
            border: none;
        }

        .navbar-static-top {
            margin-bottom: 19px;
        }

        .navbar-default .navbar-nav>li>a {
            color: #2d2d2d;
            font-weight: 600;
            margin-right: 8px;
            font-size: 14px;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: #2ecc71;
        }

        .navbar-default .navbar-brand {
            color: #179d50;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1.5em;
        }



        /* footer */


        .bg-footer {
            background-color: #e9e9e9;
            padding: 50px 0 10px;
        }

        .footer-heading {
            letter-spacing: 1px;
        }

        .footer-link a {
            color: #222222;
            line-height: 40px;
            font-size: 14px;
            transition: all 0.5s;
        }

        .footer-link a:hover {
            color: #1bbc9b;
        }

        .contact-info {
            color: #3b3b3b;
            font-size: 14px;
            margin-bottom: 16px
        }

        .footer-social-icon {
            font-size: 15px;
            height: 34px;
            width: 34px;
            line-height: 34px;
            border-radius: 3px;
            text-align: center;
            display: inline-block;
        }

        .facebook {
            background-color: #4e71a8;
            color: #ffffff;
        }

        .twitter {
            background-color: #55acee;
            color: #ffffff;
        }

        .linkedin {
            background-color: #0074bc;
            color: #ffffff;
        }

        .youtube {
            background-color: #c00000;
            color: #ffffff;
        }

        .skype {
            background-color: #00d7f4;
            color: #ffffff;
        }

        .footer-alt {
            color: #353535;
        }

        .footer-heading {
            position: relative;
            padding-bottom: 12px;
            font-size: 16px;
            font-weight: 600;
        }

        .footer-heading:after {
            content: '';
            width: 35px;
            border-bottom: 1px solid #FFF;
            position: absolute;
            left: 0;
            bottom: 0;
            display: block;
            border-bottom: 2px solid #1bbc9b;
        }
    </style>
</head>

<body>
    @include('layouts.partials.home_header')
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.javascripts')

    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('css/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    @yield('javascript')

    <footer class="section bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">আমাদের কম্পানি সম্পর্কে</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="https://www.gloriousit.com/">পেজেস</a></li>
                            <li><a href="https://www.gloriousit.com/team/">আমাদের টিম</a></li>
                            <li><a href="#showcase">ফিচারস</a></li>
                            <li><a href="#pricing">প্রাইসিং</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">কুইক লিংকস</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="{{ route('affiliat.getRegister') }}">অ্যাফিলিয়েট মার্কেটিং</a></li>
                            <li><a href="https://www.gloriousit.com/our-product/">আমাদের প্রোডাক্ট</a></li>
                            <li><a href="https://www.gloriousit.com/training/">ট্রেইনিং</a></li>
                            <li><a href="https://www.gloriousit.com/faq/">জিজ্ঞাসা</a></li>
                            <li><a href="https://www.gloriousit.com/blog/">ব্লগ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="">
                        <h6 class="footer-heading text-uppercase"> সাহায্য</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="{{ route('register') }}">রেজিস্টার করুন </a></li>
                            <li><a href="{{ route('login') }}">লগইন করুন</a></li>
                            <li><a href="https://www.gloriousit.com/terms-condition/">শর্তাবলী</a></li>
                            <li><a href="https://www.gloriousit.com/privacy-policy-2/">প্রাইভেসি পলিসি</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">যোগাযোগের ঠিকানা</h6>
                        <p class="contact-info" style="margin-top: 16px"><i class="fas fa-map-marker-alt"></i> ৩৫/২, হাজী মহসিন রোড,খুলনা </p>

                        <p class="contact-info"><i class="fas fa-envelope"></i> <a style="text-transform: lowercase; color:#3b3b3b" href="mailto:info.gloriousit@gmail.com  ">info@gloriousit.com </a> </p>

                        <p class="contact-info"><i class="fas fa-phone-alt"></i> +8801724721000 , +8801972475777 </p>


                        <div class="mt-5">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/gloriousit.net"><i class="fab facebook footer-social-icon fa-facebook-f"></i></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="https://twitter.com/glorious_it"><i class="fab twitter footer-social-icon fa-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="#"><i class="fab linkedin footer-social-icon fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="#"><i class="fab youtube footer-social-icon fa-youtube"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="#"><i class="fab skype footer-social-icon fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <hr style="border-top:1px solid #c4c4c4;">
        <div class="text-center" style="margin-top: 10px">
            <span class="footer-alt mb-0 f-14">2024 © CyberSpark Global, All Rights Reserved</span>
        </div>
    </footer>
</body>

</html>