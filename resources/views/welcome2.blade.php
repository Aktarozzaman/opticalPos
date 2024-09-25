@extends('layouts.home')
@section('title', config('app.name', 'gloriousPOS'))

@section('content')


    <style>
        .hero_text h1 {
            color: #394b59;
            font-weight: 600
        }

        .hero_text p {
            color: #7a7a7a;
            font-weight: 400
        }

        .achivements_wrapper {

            background-color: #fdfdfd;
            padding: 8px 12px;
            border-radius: 8px;
            box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
            -webkit-box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
            -moz-box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
            transition: 300ms;
        }

        .achivements_wrapper:hover {
            transform: scale(1.03);
            -webkit-transform: scale(1.03);
            -moz-transform: scale(1.03);
            -ms-transform: scale(1.03);
            -o-transform: scale(1.03);
        }

        .achivement_image {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .achivement_image img {
            width: 30%
        }

        .achivement_text {
            text-align: center
        }

        .achivement_text h1 {
            font-size: 15px;
            font-weight: 700
        }

        .achivement_text p {
            font-size: 12px;
            font-weight: 500;
            color: #a8a8a8
        }

        .slider_img img {
            width: 85% !important;
            padding-top: 30px;
        }

        .feature_wrapper {
            margin-bottom: 100px;
        }

        .showcase-text h2 {
            font-size: 28px;
            color: #394b59;
            font-weight: 600
        }

        .showcase-text p {
            font-size: 18px;
            color: #484848;
            font-weight: 400
        }


        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        .pricing_box {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 5rem;
            height: 100%;
            margin-bottom: 2rem;
            font-family: 'Poppins', sans-serif;
            transition: .3s;
            box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
            -webkit-box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
            -moz-box-shadow: 2px 10px 18px 7px rgba(25, 25, 25, 0.12);
        }

        .pricing_box:hover {
            transform: scale(1.03);
            -webkit-transform: scale(1.03);
            -moz-transform: scale(1.03);
            -ms-transform: scale(1.03);
            -o-transform: scale(1.03);
            background: #baf3ff
        }

        .pricing_box_header h2 {
            text-align: center;
            font-weight: 700;
            color: #fff;
            background-color: #3D2BFB;
            padding: 20px 0px;
            margin: 0;
        }

        .pricing_box_header h4 {
            background-color: #00ef31;
            color: black;
            padding: 10px 0px;
        }



        .feature_list {
            display: flex;
            flex-direction: column;
            row-gap: 1.5rem;


        }

        .feature_list .list_item {
            list-style: none;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 500;

        }

        .pricing_box_price {
            color: #fdfdfd;
            text-align: center;
            font-size: 2.5rem;
            margin: 0 auto;
            font-family: 'Poppins', sans-serif;
            width: 140px;
            height: 140px;
            background-color: #ff6633;
            padding: 0px 10px;
            padding-top: 50px;
            border-radius: 50%;
        }

        .pricing_box_price span {
            font-weight: 700;
            color: #fff
        }

        .pricing_box_price small {

            color: #fff
        }

        .pricing_box_footer {
            text-align: center;
            padding: 4rem;
        }

        .pricing_btn {
            background: #22a383;
            color: #fff;
            transition: .3s;
            padding: 1.4rem 3rem;
            border-radius: 3rem;
        }

        .pricing_btn:hover {
            background: #156853;
            color: #fff;
        }
    </style>

    <section id="hero_section" style="margin:100px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero_text" style="padding-top:100px ">
                                    <h2>আপনার ব্যাবসার সকল হিসাব সহজ করুন আমাদের সফটওয়্যার এর মাধ্যমে</h2>
                                    <p>সফটওয়্যার ব্যাবহার করে আপনি পাবেন  ব্যাবসার সকল সমস্যার সমাধান  ।  আপনার ব্যাবসা পরিচালনা সহজ, স্বচ্ছ ও ঝামেলা বিহীন রাখতে ব্যবহার করুন আমাদের আমাদের দেশসেরা সফটওয়্যার ।</p>
                                    <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                        href="{{ route('business.getRegister') }}" class="btn btn-primary">ফ্রি ট্রায়াল
                                        নিন</a>
                                </div>

                            </div>
                            <div class="col-md-6 slider_img" style="display: flex; justify-content:end">
                                <img src="{{ asset('images/landing_page/slider.png') }}" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero_text" style="padding-top:100px ">
                                    <h2>পস সফটওয়্যারে  ব্যাবসা পরিচালনা হবে আরোও সহজে</h2>
                                    <p>ব্যাবসার সব কঠিন হিসাবের সহজ সমাধান পস সফটওয়্যার তাই পস সফটওয়্যার আপনার ব্যাবসাকে করবে গতিশীল, ও চিন্তামুক্ত।</p>
                                    <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                        href="{{ route('business.getRegister') }}" class="btn btn-primary">ফ্রি ট্রায়াল
                                        নিন</a>
                                </div>

                            </div>
                            <div class="col-md-6 slider_img" style="display: flex; justify-content:end">
                                <img src="{{ asset('images/landing_page/banner_3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero_text" style="padding-top:100px ">
                                    <h2>সফটওয়্যার কাস্টমাইজ হবে  আপনার চাহিদা অনুযায়ী </h2>
                                    <p>আপনার ব্যাবসার ধরন ও চাহিদা হতে পারে সবার চেয়ে আলাদা  তাই আপনার চাহিদা অনুযায়ী আমরা তৈরী করি কাস্টমাইজড সফটওয়্যার যেটি হবে শুধুই আপনার । <p>
                                    <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                        href="{{ route('business.getRegister') }}" class="btn btn-primary">ফ্রি ট্রায়াল
                                        নিন</a>
                                </div>

                            </div>
                            <div class="col-md-6 slider_img" style="display: flex; justify-content:end">
                                <img src="{{ asset('images/landing_page/banner_4.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin:50px 0px" id="achivement">
        <div class="row">
            <div class="col-md-3">
                <div class="achivements_wrapper">
                    <div class="achivement_image">
                        <img src="{{ asset('images/landing_page/rating_1.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>অনলাইন এবং অফলাইন</h1>
                        <p>যেকোন ভাবে ব্যবহার করতে পারবেন</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="achivements_wrapper">
                    <div class="achivement_image">
                        <img src="{{ asset('images/landing_page/rating_3.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>বাংলা ও ইংরেজি ভাষা</h1>
                        <p>উভয় ভাষায় ব্যবহার করা যায়</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="achivements_wrapper">
                    <div class="achivement_image">
                        <img src="{{ asset('images/landing_page/rating_2.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>ই-কমার্স ও অনলাইন অর্ডার</h1>
                        <p>ওয়েবসাইট থেকে অর্ডার করা যাবে </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="achivements_wrapper">
                    <div class="achivement_image">
                        <img src="{{ asset('images/landing_page/rating_4.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>মোবাইল এবং ওয়েব এপ্লিকেশন</h1>
                        <p>রিমোটলি ব্যবহার করা যায়</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section style="margin:100px 0px" id="features">
        <div class="row">
            <div class="col-md-12">
                
                <h3>যে সকল ব্যাবসা প্রতিষ্ঠানে গ্লোরিয়াস পস সফটওয়্যার ব্যাবহার করতে পারবেন ।</h3>
<h3><b>রেস্তোরা, ব্যাগের দোকান, কফি শপ , গিফট শপ </b> </h3>
                <!--<img src="{{ asset('images/landing_page/image_2023_03_29T10_51_42_997Z.png') }}" width="100%">-->


            </div>

        </div>
    </section>

    <section class="showcase" style="margin:100px 0px" id="showcase">
        <div class="feature_wrapper">
            <div class="row">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/feature_1.jpg') }}" alt="" style="width: 100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>ইনভয়েসিং ও ইনভেন্টরি</h2>
                    <p class="lead mb-0">প্রফেশনাল ইনভয়েস ( বিক্রয় রসিদ ) ও ইনভেন্টরি ম্যানেজমেন্টের মাধ্যমে আপনি জানতে পারবেন আপনার স্টকের সব পন্যের বর্তমান অবস্থা ।</p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>কমপ্লিট একাউন্টিং </h2>
                    <p class="lead mb-0">একাউন্টিং না জানলেও এখন সফটওয়্যার হবে আপনার একাউন্টেন্ট । হিসাব থাকবে সচ্ছ ও সাজানো-গোছানো । এক ক্লিকেই দেখতে পাবেন যে কোনো রিপোর্ট।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/acc.jpg') }}" alt="" style="width: 100%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/sms.jpg') }}" alt="" style="width: 100%">

                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>এসএমএস ইন্টিগ্রেশন</h2>
                    <p class="lead mb-0">ক্রেতা- বিক্রেতাকে  এসএমএস পাঠাতে পারবেন আপনার ইচ্ছামত । বাকি টাকা , কিস্তির টাকা , ক্রয় সংক্রান্ত ম্যাসেজ বা  উৎসবে আপনার ম্যাসেজ হবে বিজ্ঞাপনের কৌশল ।</p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>ব্যাবসার বাইরে আছেন ?</h2>
                    <p class="lead mb-0"> যেখানেই থাকুন  মোবাইল এ্যাপে  সার্বক্ষনিক নজর রাখুন আপনার ব্যাবসায় । ব্যাবসার বিক্রি,স্টক, লাভ-লস , সবকিছুই দেখতে পাবেন বিশ্বের যে কোন প্রান্ত থেকে । ব্যাবসা হবে এখন ডিজিটাল । </p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/tour.jpg') }}" alt="" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/due.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>কাস্টমারের বাঁকী হিসাব</h2>
                    <p class="lead mb-0">কোন কাষ্টোমারের কাছে কবে কত টাকা বাঁকী থাকলো, কাষ্টোমার কবে কত টাকা পেমেন্ট
                        করল, বর্তমানে কোন কাষ্টোমারের কাছে কত টাকা বাঁকী আছে সকল ধরনের হিসাব রাখা এবং দেখার ব্যবস্থা
                        রয়েছে। বিক্রয় করার মুহূর্তেই কাস্টমারের কাছে কত টাকা পাওনা আছে তা দেখতে পারবেন এবং সেই সাথে
                        কাস্টমারের পূর্বের সকল ক্রয় এবং পেমেন্টের হিস্টরি দেখে নিতে পারবেন।</p>
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>মাসিক লাভ/লোকসানের হিসাব</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">কোন কাষ্টোমারের কাছে কবে কত টাকা বাঁকী থাকলো, কাষ্টোমার কবে কত টাকা পেমেন্ট
                        করল, বর্তমানে কোন কাষ্টোমারের কাছে কত টাকা বাঁকী আছে সকল ধরনের হিসাব রাখা এবং দেখার ব্যবস্থা
                        রয়েছে। বিক্রয় করার মুহূর্তেই কাস্টমারের কাছে কত টাকা পাওনা আছে তা দেখতে পারবেন এবং সেই সাথে
                        কাস্টমারের পূর্বের সকল ক্রয় এবং পেমেন্টের হিস্টরি দেখে নিতে পারবেন।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/profit.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/feature_2.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>প্রোডাক্ট এবং দিন অনুযায়ী লাভ/লোকসানের হিসাব</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">শুধু মাসিকই না। কোন প্রোডাক্ট বিক্রয়ের মাধ্যমে কত টাকা লাভ হল সেটা যেমন দেখতে পারবেন,
                        তেমনি কোন নির্দিষ্ট দিনে কত টাকা লাভ/লোকসান হল তাও দেখতে পারবেন।</p>
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 showcase-text" style="padding-top: 120px" data-aos="fade-right">
                    <h2>বারকোড স্ক্যান এবং প্রিন্ট</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">শুধু মাসিকই না। কোন প্রোডাক্ট বিক্রয়ের মাধ্যমে কত টাকা লাভ হল সেটা যেমন দেখতে পারবেন,
                        তেমনি কোন নির্দিষ্ট দিনে কত টাকা লাভ/লোকসান হল তাও দেখতে পারবেন।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/barcode.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/summary_2.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>সারাদিনের সকল হিসাবের সারাংশ</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">ডেইলি সামারি হচ্ছে কোন একটি দিনের পুরো হিসাবের সারসংক্ষেপ। যেমন কোন একটি
                        নির্দিষ্ট দিনে কত টাকা ক্রয়, কত বিক্রয়, কত খরচ, প্রোডাক্ট নষ্ট বাবদ কত ক্ষতি, ক্রয় রিটার্ন কত টাকার,
                        বিক্রয় রিটার্ন কত টাকার ইত্যাদি সব হিসাব করে ব্যালান্স কত রয়েছে তা দেখতে পারবেন।</p>
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>
                        দোকানের ব্যয়</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">ডেইলি সামারি হচ্ছে কোন একটি দিনের পুরো হিসাবের সারসংক্ষেপ। যেমন কোন একটি
                        নির্দিষ্ট দিনে কত টাকা ক্রয়, কত বিক্রয়, কত খরচ, প্রোডাক্ট নষ্ট বাবদ কত ক্ষতি, ক্রয় রিটার্ন কত টাকার,
                        বিক্রয় রিটার্ন কত টাকার ইত্যাদি সব হিসাব করে ব্যালান্স কত রয়েছে তা দেখতে পারবেন।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/expense.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/manage_user.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>ইউজার এ্যাকসেস কন্ট্রোল</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">
                        ইউজার এ্যাকসেস কন্ট্রোল
                        সফটওয়্যারটির এ্যাকসেস কন্ট্রোল ফিচারের মাধ্যেমে আপনি যে কোন ইউজার কতটুকু জায়গায় এ্যাকসেস পাবে তা
                        নিয়ন্ত্রন করতে পারবেন।</p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 showcase-text" style="padding-top: 120px" data-aos="fade-right">
                    <h2>ডাটাবেস ব্যাকআপ</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">সফটওয়্যার থেকে খুব সহজেই ডাটাবেস এর ব্যাকআপ রাখতে পারভেন। আপনার মূল্যবান ডাটা
                        সবসময় আপনার নিয়ন্ত্রন এ থাকবে।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/database.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>

    <section class="pricing_section" style="margin:100px 0px;" id="pricing">
        <div class="row">
            <div class="col-md-12 section_header text-center">
                <h1>প্যাকেজ সমূহ ও নির্ধারিত মূল্য</h1>
                <h4>আপনার ব্যবসার জন্য উপযুক্ত প্যাকেজ টি সাবস্ক্রাইব করে গ্লোরিয়াস আইটি এর সাথে থাকুন</h4>
            </div>
        </div>

        <div class="row">
            @php
                $delay = 0;
            @endphp

            @foreach ($packages as $package)
                @if (
                    $package->is_private == 1 &&
                        !auth()->user()->can('superadmin'))
                    @php
                        continue;
                        
                    @endphp
                @endif

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $delay += 200 }}">
                    <div class="pricing_box">
                        <div class="pricing_box_body">
                            <div class="feature_list">

                                @if ($package->id == 1)
                                    <div class="pricing_box_header">
                                        <h2>ফ্রি ১৪ দিন ট্রায়াল</h2>
                                    </div>
                                @endif

                                @if ($package->id == 2)
                                    <div class="pricing_box_header">
                                        <h2>স্টার্টআপ</h2>
                                        <h4 class="text-center">সেটআপ ফী ৳ ৪৯৯৯</h4>
                                    </div>
                                @endif

                                @if ($package->id == 3)
                                    <div class="pricing_box_header">
                                        <h2>বিজনেস</h2>
                                        <h4 class="text-center">সেটআপ ফী ৳ ৪৯৯৯</h4>
                                    </div>
                                @endif

                                @if ($package->id == 4)
                                    <div class="pricing_box_header">
                                        <h2>কর্পোরেট</h2>
                                        <h4 class="text-center">সেটআপ ফী ৳ ৪৯৯৯</h4>
                                    </div>
                                @endif

                                @if ($package->id == 5)
                                    <div class="pricing_box_header">
                                        <h2>স্ট্যান্ডার্ড</h2>
                                      <h4 class="text-center">সেটআপ ফী ৳ ১৪৯৯৯</h4>
                                    </div>
                                @endif

                                @if ($package->id == 6)
                                    <div class="pricing_box_header">
                                        <h2 style="font-size: 25px">কাস্টমাইজড সফটওয়্যার</h2>
                                        <h4 class="text-center">আলোচনা সাপেক্ষে </h4>
                                    </div>
                                @endif

                                <h1 class="pricing_box_price">
                                    @php
                                        $interval_type = !empty($intervals[$package->interval]) ? $intervals[$package->interval] : __('lang_v1.' . $package->interval);
                                    @endphp
                                    @if ($package->price != 0)
                                        @if ($package->id == 6)
                                            <span style="font-size: 20px">আলোচনা সাপেক্ষে </span>
                                        @else
                                            <span>
                                                ৳{{ (int) $package->price }}
                                            </span>

                                            <small>
                                                / Monthly
                                            </small>
                                        @endif
                                    @else
                                        @lang('superadmin::lang.free_for_duration', ['duration' => $package->interval_count . ' ' . $interval_type])
                                    @endif
                                </h1>

                                <!-- For 1 id code start -->
                                @if ($package->id == 1)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কোম্পানি -১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            প্রোডাক্ট এন্ট্রি -৫০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ইনভয়েস ৫০০ (মাসিক)
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টাফ / ইউজার - ১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার - ১০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            সাপ্লাইয়ার - ১০০
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস ৬০+
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fas fa-times cross text-danger"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item" style="margin-bottom: 57px">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                                <!-- For 2 id code start -->
                                @if ($package->id == 2)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কোম্পানি -১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            প্রোডাক্ট এন্ট্রি -৫০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ইনভয়েস ৫০০ (মাসিক)
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টাফ / ইউজার - ১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার - ১০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            সাপ্লাইয়ার - ১০০
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস ৬০+
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                                <!-- For 3 id code start -->
                                @if ($package->id == 3)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কোম্পানি -১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            প্রোডাক্ট এন্ট্রি -১০০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ইনভয়েস ১০০০ (মাসিক)
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টাফ / ইউজার - ১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার - ৫০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            সাপ্লাইয়ার - ৫০০
                                        </span>
                                    </div>



                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস ৬০+
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                                <!-- For 4 id code start -->
                                @if ($package->id == 4)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কোম্পানি -১
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            প্রোডাক্ট এন্ট্রি -২০০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ইনভয়েস ২০০০ (মাসিক)
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টাফ / ইউজার - ২
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার - ১০০০
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            সাপ্লাইয়ার - ১০০
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস ৬০+
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item" style="margin-bottom: 173px">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                                <!-- For 5 id code start -->
                                @if ($package->id == 5)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কোম্পানি -২
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড প্রোডাক্ট এন্ট্রি
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড ইনভয়েস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টাফ / ইউজার - ৩
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড কাস্টমার
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড সাপ্লাইয়ার
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়ারেন্টি/ গ্যারেন্টি সিস্টেম
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস ৬০+
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item" style="margin-bottom: 138px">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                                <!-- For 6 id code start -->
                                @if ($package->id == 6)
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড কোম্পানি
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড প্রোডাক্ট এন্ট্রি
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড ইনভয়েস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড স্টাফ / ইউজার
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড কাস্টমার
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            আনলিমিটেড সাপ্লাইয়ার
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টম ডোমেইন
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ই-কমার্স ওয়েবসাইট
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            মোবাইল অ্যাপ
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন অর্ডার
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়ারেন্টি / গ্যারেন্টি সিস্টেম
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            রিপোর্টস
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অ্যাকাউন্টস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ক্রয় বিক্রয় হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            স্টক ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            খরচ হিসাব
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            এসএমএস
                                        </span>
                                    </div>

                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ডাটাবেস ব্যাকআপ
                                        </span>
                                    </div>


                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            অনলাইন ট্রেনিং
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            কাস্টমার সাপোর্ট ২৪/৭
                                        </span>
                                    </div>
                                @endif

                            </div>




                        </div>

                        <div class="pricing_box_footer">

                            @if ($package->enable_custom_link == 1)
                                <a href="{{ $package->custom_link }}" class="pricing_btn">
                                    {{ $package->custom_link_text }}</a>
                            @else
                                @if (isset($action_type) && $action_type == 'register')
                                    <a href="{{ route('business.getRegister') }}?package={{ $package->id }}"
                                        class="pricing_btn">
                                        @if ($package->price != 0)
                                            @lang('superadmin::lang.register_subscribe')
                                        @else
                                            @lang('superadmin::lang.register_free')
                                        @endif

                                    </a>
                                @else
                                    <a href="{{ route('business.getRegister') }}"
                                        class="pricing_btn">

                                        Order Now
                                    </a>
                                @endif
                            @endif


                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                @if ($loop->iteration % 3 == 0)
                    <div class="clearfix"></div>
                @endif
            @endforeach

        </div>

    </section>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })

            AOS.init({
                easing: 'ease-in-out-sine',
                once: true,
                duration: 700,
                offset: 200,
                delay: 0
            });
        })
    </script>
@endsection
