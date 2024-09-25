<!-- Static navbar -->

<style>
    .navbar-brand {
        float: left;
        height: 54px;
        padding: 0px 0px;
        font-size: 18px;
        margin-top: -40px;
    }

    /* GM Ashikur Rahman */
    /* Header login and register part */
    .login {
        color: #ffff;
    }

    .login:hover {
        color: black;
    }

    .regiser {
        background: #034C79;
        color: #ffff;
    }

    .nav .navbar-nav .navbar-right li .login-bg {
        color: red !important;
    }

    .nav.navbar-nav.navbar-right li a {
        color: #ffff;
        transition: all linear .3s;
    }

    .nav.navbar-nav.navbar-right li:hover a {
        color: #000000 !important;
        transition: all linear .3s;
    }

    .navbar-collapse li {
        margin-bottom: 10px !important;
    }

    .header_number_padding {
        margin-bottom: 5px;
    }

    .font-header img {
        width: 20px;
        margin-bottom: 3px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-default navbar-fixed-top"
            style="background: #fff; box-shadow: 1px 2px 70px 1px rgba(25, 25, 25, 0.10);">
            <div class="container">
                <div class="container text-right header-number  pt-2 header_number_padding"
                    style="padding-top: 10px; padidng-bottom:10px; padding-right:295px;">
                    <a style="font-size: 16px; color:#17a2b8; margin-top:5px;" class="theme-color font-header"
                        href="tel: +88017 5956 8080">
                        <img src="{{ asset('images/landing_page/whatsapp.png') }}" alt="" width="25">
                    </a>&nbsp;
                    <a style="font-size: 16px; color:#17a2b8; margin-top:5px;"
                        class="theme-color font-header hidden-mobile" href="tel: +88017 2472 1000">+8801724721000</a>
                    &nbsp;&nbsp;

                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{ asset('uploads/logo.png') }}" alt=""
                            style="height: 45px;
    width: 200px;
    padding-top: 10px;"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        @if (Route::has('frontend-pages') && config('app.env') != 'demo' && !empty($frontend_pages))
                            @foreach ($frontend_pages as $page)
                                <li><a
                                        href="{{ action('\Modules\Superadmin\Http\Controllers\PageController@showPage', $page->slug) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                        @endif

                        @if (Route::has('repair-status'))
                            <li>
                                <a
                                    href="{{ action('\Modules\Repair\Http\Controllers\CustomerRepairStatusController@index') }}">
                                    @lang('repair::lang.repair_status')
                                </a>
                            </li>
                        @endif

                        <li><a href="https://www.gloriousit.com/" target="_blank" style="">মেইন ওয়েবসাইট</a></li>
                        <li><a href="#pricing">প্যাকেজ সমূহ</a></li>

                        <!--<li><a href="https://www.gloriousit.com/order">সফটওয়্যার অর্ডার</a></li>-->
                        <li><a href="https://www.gloriousit.com/software-list/" target="_blank">রেডি সফটওয়্যার</a></li>
                        <!--<li><a href="https://www.gloriousit.com/contact-us/">যোগাযোগ</a></li>-->
                        <li><a href="https://www.gloriousit.com/faq/">জিজ্ঞাসা</a></li>
                        <li><a href="https://www.youtube.com/watch?v=VOMTLkZmeKA&list=PL9IzF4wUqEbu347gIDe-7g8WGvRuGVfU2"
                                target="_blank">ভিডিও টিউটোরিয়াল</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            @if (Auth::check())
                                <li><a style="color:    color: #fff !important;
                                    background-color: #00aeef;"
                                        href="{{ action('HomeController@index') }}">সফটওয়্যার ড্যাশবোর্ড</a></li>
                            @endif
                            @if (!Auth::check())
                                <li><a href="{{ route('login') }}" class="btn login-bg"
                                        style="background-color:#007bc8; padding:8px; color:#ffff; ">লগইন</a></li>
                                @if (config('constants.allow_registration'))
                                    <li><a href="{{ route('business.getRegister') }}" class="btn register"
                                            style="background-color:#007bc8; padding:8px;">রেজিস্টেশন</a></li>
                                @endif
                            @endif
                        @endif
                    </ul>
                </div><!-- nav-collapse -->
            </div>
        </nav>
    </div>
</div>
