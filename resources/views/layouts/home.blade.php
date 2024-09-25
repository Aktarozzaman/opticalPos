<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-style.css') }}">

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css"> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        
        .ssl_image{
           width: 100%;
        height: auto;
 
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
            line-height: 30px;
            font-size: 14px;
            transition: all 0.5s;
        }

        .footer-link a:hover {
            color: #1bbc9b;
        }

        .contact-info {
            color: #3b3b3b;
            font-size: 14px;
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

        .footer-info img {
            margin-bottom: 5px;
        }

        .contact-whatsapp a {
            color: #3b3b3b;
        }

        .contact-whatsapp a i {
            color: #00af4a;
            font-size: 20px;
        }

        /* icon */
        .fa,
        .fas {
            color: #3b3ba1;
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
            <div class="row" style="margin-bottom:20px;">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info mb-40">
                        <img class="mb-2" src="{{ asset('uploads/logo.png') }}" width="175" height="35"
                            style="margin-bottom:20px" alt="logo">
                        <p style="font-weight:bold" class="">সেলস এবং মার্কেটিং: </p>
                        <p class="contact-info contact-whatsapp">
                            <a href="https://web.whatsapp.com/" target="_blank">
                                <i class="fa-brands fa-square-whatsapp"></i>
                                +8801724721000, +8801759568080
                            </a>
                        </p>
                        <br>
                        <p style="font-weight:bold" class="theme-color">কাস্টমার সাপোর্ট: </p>
                        <p class="contact-info contact-whatsapp">
                            <a href="https://web.whatsapp.com/" target="_blank">
                                <i class="fa-brands fa-square-whatsapp"></i>+8801725156000
                            </a>
                        </p>
                        <p class="contact-info">
                            <i class="fas fa-earth"></i>
                            <a style="text-transform: lowercase; color:#3b3b3b" href="https://www.gloriousit.com/">gloriousit.com</a>
                        </p>
                        <p class="contact-info">
                            <i class="fas fa-envelope"></i>
                            <a style="text-transform: lowercase; color:#3b3b3b" href="mailto:info.gloriousit@gmail.com">info@gloriousit.com</a>
                        </p>
                        <p class="contact-info">
                            <i class="fas fa-envelope"></i>
                            <a style="text-transform: lowercase; color:#3b3b3b" href="mailto:info.gloriousit@gmail.com">info.gloriousit@gmail.com</a>
                        </p>
    
                        <div class="mt-5">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a target="_blank" href="https://www.facebook.com/gloriousit.net">
                                        <i class="fab facebook footer-social-icon fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" href="#">
                                        <i class="fab youtube footer-social-icon fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" href="#">
                                        <i class="fab skype footer-social-icon fa-skype"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" href="https://twitter.com/glorious_it">
                                        <i class="fab twitter footer-social-icon fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" href="#">
                                        <i class="fab linkedin footer-social-icon fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-2 col-md-6">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">আমাদের সার্ভিস</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="https://www.gloriousit.com/">সফটওয়্যার ডেভেলপমেন্ট</a></li>
                            <li><a href="https://www.gloriousit.com/team/">অ্যাপ ডেভেলপমেন্ট</a></li>
                            <li><a href="#">ওয়েবসাইট ওডেভেলপমেন্ট</a></li>
                            <li><a href="#">ডোমেন ও হোস্টিং</a></li>
                            <li><a href="#">ডিজিটাল মার্কেটিং ও এসইও</a></li>
                            <li><a href="#">বাল্ক এসএমএস</a></li>
                            <li><a href="#">কাস্টম সফটওয়্যার</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-2 col-md-6">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">প্রয়োজনীয় লিংক</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="{{ route('affiliat.getRegister') }}">অ্যাফিলিয়েট মার্কেটিং</a></li>
                            <li><a href="https://www.gloriousit.com/training/">সাধারণ প্রশ্ন উত্তর</a></li>
                            <li><a href="https://www.youtube.com/@gloriousitbd">ভিডিও টিউটোরিয়াল</a></li>
                            <li><a href="https://www.gloriousit.com/faq/">প্রাইভেসী এবং পলিসি</a></li>
                            <li><a href="https://www.gloriousit.com/faq/">টার্মস এবং কন্ডিশনস</a></li>
                            <li><a href="https://www.gloriousit.com/faq/">সার্ভিস পলিসি</a></li>
                            <li><a href="https://www.gloriousit.com/blog/">ব্লগ</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-2 col-md-6">
                    <div class="">
                        <h6 class="footer-heading text-uppercase">রেডি সফটওয়্যার</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="https://restaurant.gloriousit.xyz/">রেস্টুরেন্ট ম্যানেজমেন্ট</a></li>
                            <li><a href="https://pharmacy.gloriousit.xyz/">ফার্মেসী ম্যানেজমেন্ট</a></li>
                            <li><a href="https://www.gloriousit.com/project/hospital-management-software/">হসপিটাল ম্যানেজমেন্ট</a></li>
                            <li><a href="https://www.gloriousit.com/project/school-management-software/">স্কুল ম্যানেজমেন্ট</a></li>
                            <li><a href="https://www.gloriousit.com/project/human-management-software/">HR পেরোল ম্যানেজমেন্ট</a></li>
                            <li><a href="https://www.gloriousit.com/software-list/">অন্যান্য সফটওয়্যার</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6">
                    <div class="">
                        <div class="single-footer-widget">
                            <div class="fb-page" data-href="https://www.facebook.com/gloriousit.net/?ref=embed_page"
                                data-tabs="timeline" data-width="" data-height="250px" data-small-header="false"
                                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/gloriousit.net/?ref=embed_page"
                                    class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/gloriousit.net/?ref=embed_page">Glorious IT</a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div style=" text-align: center;">
                        <picture>
                            <img class="ssl_image"  src="/images/landing_page/ssl_1.png" alt="ssl image">
                        </picture>
                    </div>
                </div>
            </div>

    
            <hr style="border-top:1px solid #c4c4c4;">
            <div class="text-center" style="margin-top: 10px">
                <span class="footer-alt mb-0 f-14">2023 © Glorious IT, All Rights Reserved</span>
            </div>
        </div>
    </footer>


    <div id="fb-root"></div>

    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/slick-custom.js"></script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0"
        nonce="KmEIzpcd"></script>

</body>

</html>
