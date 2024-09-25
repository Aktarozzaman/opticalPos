@extends('layouts.home')
@section('title', config('app.name', 'gloriousPOS'))

@section('content')

    <style>
        .hero_text h2 {
            color: #394b59;
            font-weight: 600;
            line-height: 43px;
        }

        .hero_text p {
            color: #7a7a7a;
            font-weight: 400;
            line-height: 25px;
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

        /*============= Team css part ==============*/
        #team {
            padding-top: 100px;
        }

        .team-info {
            padding-top: 35px;
        }

        .team-info h3 {
            font-size: 14px;
            color: #333;
            font-weight: 400;
            font-family: 'Montserrat';
            text-transform: uppercase;
        }

        .team-info p {
            font-family: 'Roboto';
            font-size: 15px;
            color: #999;
            font-weight: 300;
            font-style: italic;
            text-transform: capitalize;
        }

        .team-img img {
            width: 160px;
            margin-left: 80px;
            border: 2px solid #dddd;
            padding: 15px;
        }

        .tb-image img {
            width: 118px;
        }

        .knowledge-image img {
            width: 146px;
        }

        .heading h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 50px;
        }



        .showcase-text1 h2 {
            font-size: 36px;
            text-align: center;
            font-weight: 700;
            margin-bottom: 80px;

        }

        .showcase-text h2 {
            font-size: 28px;
            color: #394b59;
            font-weight: 600;
            line-height: 40px;
        }

        .showcase-text p {
            font-size: 18px;
            color: #484848;
            font-weight: 400;
            line-height: 33px;
        }

        .discount-image img {
            width: 90%;
        }

        .report-image img {
            width: 80%;
        }

        .data-image img {
            width: 80%;
        }

        .sells-image img {
            width: 110% !important;
        }

        .imei-image img {
            width: 400px;
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
            background: ;
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

        .pricing_box:hover {
            background: #baf3ff !important;
        }

        .pricing_box_price small {

            color: #fff
        }

        .pricing_box_footer {
            text-align: center;
            padding: 4rem;
        }

        .pricing_btn {
            background: #00AEEF;
            color: #fff;
            transition: .3s;
            padding: 12px 57px;
            border-radius: 3rem;
            font-size: 22px;
            box-shadow: 1px 1px 16px -4px black;
        }

        .pricing_btn:hover {
            background: #F90;
            color: #fff;
        }

        /* GM Ashikur Rahman start */

        /* navbar part */
        .navbar-brand img {
            padding-top: 0px !important;
            margin-top: 37px;
        }

        .header_number_padding a {
            margin-bottom: 6px;
            color: #191515 !important;

        }

        .navbar-nav li:hover a {
            color: #00AEEF !important;
            transition: all linear .3s;
        }

        .navbar-collapse li {
            margin-bottom: 20px;
        }

        .btn-bg {
            border: inherit;
            background-color: #00AEEF;
            transition: all linear .3s;
        }

        .btn-bg:hover {
            background-color: #007bc8;
            transition: all linear .3s;
        }

        .ecommerce-img img {
            width: 53%;
        }

        .online-img img {
            width: 34%;
        }

        .organize-use h3 {
            text-align: center;
            padding-bottom: 40px;
            margin-top: 100px;
            font-size: 30px;
            font-weight: 700;
        }

        .product-have {
            padding: 15px;
            margin-left: 85px;
        }

        .product-have h4 {
            font-weight: 700;
            padding-bottom: 20px;
        }

        .product-have .list_item {
            padding-bottom: 10px;
        }

        .product-have .list_item i span {
            text-align: inherit;
        }

        .border-have {
            padding-bottom: 360px
        }

        .border-have-left {
            margin-right: 15px;
        }

        /* video part */
        #video {
            margin-bottom: 70px;
        }

        .video-gallery h2 {
            font-weight: 700;
            text-align: center;
            padding-bottom: 30px;
        }

        .mr-right {
            margin-bottom: 30px;
        }

        /* order part */
        #order {
            border-radius: 15px;
            margin-top: 170px;
            margin-bottom: 70px;
            position: relative;
            background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8d98e6, #7d97eb, #6896f0, #5288f6, #3a7afa, #216afe, #0059ff);
        }

        .order-img {
            position: absolute;
            height: 300px;
            width: 300px;
            left: 14px;
            top: -73px;
        }

        .order-text {
            text-align: center;
        }

        .order-text h3 {
            margin-top: 50px;
            padding-bottom: 20px;

        }

        .order-text h3 a:hover {
            background-color: #F90;

        }

        .order-text h3 {
            position: relative;
        }

        .order-text h3 a {
            position: absolute;
            font-size: 22px;
            padding: 12px 25px;
            color: #ffff;
            transition: all linear .2s;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            margin-left: -70px;
            margin-top: -15px;
            font-weight: 700;
        }

        .order-text h3 a:before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            bottom: 2px;
            width: 50%;
            background: rgba(255, 255, 255, 0.05);

        }

        .order-text h3 a span:nth-child(1) {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #0c002b, #ffffff);
            animation: animate1 2s linear infinite;

        }

        @keyframes animate1 {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .order-text h3 a span:nth-child(2) {
            position: absolute;
            top: 0px;
            right: 0px;
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, #40ffcf, #000000);
            animation: animate2 2s linear infinite;
        }

        @keyframes animate2 {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .order-text h3 a span:nth-child(3) {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 2px;
            background: linear-gradient(to left, #faf207, #0901ff);
            animation: animate3 2s linear infinite;
        }

        @keyframes animate3 {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .order-text h3 a span:nth-child(4) {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 2px;
            height: 100%;
            background: linear-gradient(to top, #fd0e56, #07ee0b);
            animation: animate4 2s linear infinite;
        }

        @keyframes animate4 {
            100% {
                transform: translateY(-100%);
            }

            0% {
                transform: translateY(100%);
            }
        }

        .order-text h4 {
            color: #ffff;
            font-size: 22px;
            font-weight: 400;
            padding-top: 30px;
        }

        .order-text p {
            color: #ffff;
            font-size: 22px;
            font-weight: 400;
            padding-bottom: 17px;
        }

        .order-text p img {
            width: 25px;
            height: 25px;
        }

        .list-inline li a i {
            transition: all linear .2s;
        }

        .list-inline li a i:hover {
            border-radius: 50%;
            transition: all linear .2s;
        }



        .box,
        .info-box {
            box-shadow: inherit !important;
            border: inherit !important;
        }

        .whatsapp-image {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 9999999999999999;
        }

        .whatsapp-image img {
            width: 30px;
        }

        .messenger-image {
            position: fixed;
            bottom: 21px;
            right: 30px;
            z-index: 9999999999999999;
        }

        .messenger-image img {
            width: 48px;
        }











        /* --------------------------------------break point -------------------------------*/
        @media (max-width: 576px) {
            .header_number_padding {

                padding-right: inherit !important;
            }

            .header_number_padding {
                margin-right: 137px;
            }

            .achivements_wrapper {
                margin-top: 10px;
            }

            .team-img img {
                margin-left: 50px;
            }

            .pricing_btn {
                padding: 10px 15px;
                font-size: 20px;
            }

            .ssl-image img {
                width: 280px;
                margin-top: 10px;
                align-items: inherit;
            }

            .imei-image img {
                width: 300px;
            }

            .order-img {
                left: -8px;
                top: -194px;
            }

            .box {
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                box-shadow: inherit !important;
                border: inherit;
            }


        }

        @media (min-width:577px) and (max-width: 767px) {


            .achivements_wrapper {
                margin-top: 20px;
            }

            .ssl-image img {
                width: 400px;
                margin-top: 10px;
                align-items: inherit;
            }

            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9 {
                margin-top: 20px;
            }

            .ssl-image img {
                width: 560px;
            }

            .box {
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                box-shadow: inherit !important;
                border: inherit;
            }

        }

        @media (min-width:768px) and (max-width: 992px) {
            .ssl-image img {
                width: 660px;
            }

            .navbar>.container .navbar-brand,
            .navbar>.container-fluid .navbar-brand {
                margin-bottom: 25px;
            }

            .navbar-collapse li {
                margin-bottom: -5px !important;
            }

            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9 {
                margin-top: 20px;
            }

            .box {
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                box-shadow: inherit !important;
                border: inherit;
            }
        }

        @media (min-width:993px) and (max-width: 1200px) {
            .pricing_btn {
                padding: 12px 40px;
            }

            .ssl-image img {
                width: 80%;
            }

            .box {
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                box-shadow: inherit !important;
                border: inherit;
            }
        }
    </style>



    <section id="hero_section" style="margin:100px 0px">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero_text" style="padding-top:60px ">
                                    <h2>আপনার ব্যবসার সকল হিসাব সহজ করুন গ্লোরিয়াস পস সফটওয়্যার এর মাধ্যমে</h2>
                                    <p>আপনার ব্যবসা পরিচালনা সহজ, স্বচ্ছ ও ঝামেলা বিহীন রাখতে ব্যবহার করুন আমাদের দেশ সেরা
                                        গ্লোরিয়াস পস সফটওয়্যার ।</p>
                                    <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                        href="{{ route('business.getRegister') }}" class="btn btn-primary btn-bg">ফ্রি
                                        ট্রায়াল
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
                                    <h2>গ্লোরিয়াস পস সফটওয়্যার এর মাধ্যমে ব্যবসা পরিচালনা হবে আরোও সহজে </h2>
                                    <p>ব্যবসার সব কঠিন হিসাবের সহজ সমাধান গ্লোরিয়াস পস সফটওয়্যার । তাই গ্লোরিয়াস পস
                                        সফটওয়্যার আপনার ব্যবসাকে করবে গতিশীল ও চিন্তামুক্ত। </p>
                                    <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                        href="{{ route('business.getRegister') }}" class="btn btn-primary btn-bg">ফ্রি
                                        ট্রায়াল
                                        নিন</a>
                                </div>

                            </div>
                            <div class="col-md-6 slider_img" style="display: flex; justify-content:end">
                                <img src="{{ asset('images/landing_page/banner1.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hero_text" style="padding-top:100px ">
                                    <h2> সফটওয়্যার কাস্টমাইজ হবে আপনার চাহিদা অনুযায়ী </h2>
                                    <p>আপনার ব্যবসার ধরন ও চাহিদা হতে পারে সবার চেয়ে আলাদা তাই আপনার চাহিদা অনুযায়ী আমরা
                                        তৈরী করি কাস্টমাইজড সফটওয়্যার যেটি হবে শুধুই আপনার ।
                                    <p>
                                        <a style="width: 200px;height: 46px;font-size: 24px;text-align: center;"
                                            href="{{ route('business.getRegister') }}" class="btn btn-primary btn-bg">ফ্রি
                                            ট্রায়াল
                                            নিন</a>
                                </div>

                            </div>
                            <div class="col-md-6 slider_img" style="display: flex; justify-content:end">
                                <img class="img-100" src="{{ asset('images/landing_page/slider3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section style="margin: 50px 0px" id="achievement">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="achivements_wrapper animate__backOutRight" data-aos="fade-right">
                    <div class="achivement_image">
                        <img src="{{ asset('images/landing_page/rating_3.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>বাংলা ও ইংরেজি ভাষা</h1>
                        <p>উভয় ভাষায় ব্যবহার করা যায়</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 col-lg-3">
                <div class="achivements_wrapper" data-aos="fade-up">
                    <div class="achivement_image ecommerce-img">
                        <img src="{{ asset('images/landing_page/offline.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>অনলাইন এবং অফলাইন</h1>
                        <p>যেকোন ভাবে ব্যবহার করতে পারবেন</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 col-lg-3">
                <div class="achivements_wrapper" data-aos="fade-down">
                    <div class="achivement_image online-img">
                        <img src="{{ asset('images/landing_page/online.png') }}">
                    </div>
                    <div class="achivement_text">
                        <h1>ই-কমার্স ও অনলাইন অর্ডার</h1>
                        <p>ওয়েবসাইট থেকে অর্ডার করা যাবে</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 col-lg-3">
                <div class="achivements_wrapper" data-aos="fade-left">
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
    





    <section style="margin:30px 0px" id="features">
        <div class="row">
            <div class="col-md-12">
                <div class="organize-use">
                    <h3>গ্লোরিয়াস পস সফটওয়্যার যে সকল ব্যবসা প্রতিষ্ঠানে ব্যবহার করতে পারবেন</h3>
                </div>

                <!--<img src="{{ asset('images/landing_page/image_2023_03_29T10_51_42_997Z.png') }}" width="100%">-->

                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-4 border-have-left" data-aos="fade-right">
                        <div class="product-have">
                            <h4>যাদের পন্য আছেঃ</h4>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    সুপার শপ
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ডিপার্টমেন্টাল স্টোর
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ফার্মেসি
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    রেস্টুরেন্ট
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    গ্রোসারী দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    গার্মেন্টস দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মোবাইল দোকান
                                </span>
                            </div>


                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    কম্পিউটার দোকান
                                </span>
                            </div>


                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    টাইলস এন্ড সিরামিক দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    রড সিমেন্ট
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ইলেকট্রিক & ইলেকট্রনিক্স দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    হার্ডওয়্যার দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ফ্যাশন হাউজ
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    জুয়েলারি দোকান
                                </span>
                            </div>


                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ফার্নিচার দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মোটর সাইকেল শোরুম
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মিষ্টি ও বেকারি দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    কন্সট্রাকশন সামগ্রীর দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    জুতার দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    বইয়ের দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    প্লাস্টিক পন্যের দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    গিফ্‌ট সপ
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    খেলাধুলা সামগ্রীর দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    কসমেটিকস এর দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    খেলনার দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    সাইকেলের দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ব্যাগের দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    চশমার দোকান
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ঘড়ির দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    যে কোন ধরনের খুচরা ও পাইকারী ব্যবসা প্রতিষ্ঠান
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-4 border-have" data-aos="fade-left">
                        <div class="product-have">
                            <h4> যাদের পন্য ও সেবা উভয় আছেঃ</h4>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মোবাইল/কম্পিউটার সার্ভিসিং সেন্টার
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    অটোমোবাইল ওয়ার্কশপ
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    বিউটি পার্লার
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    অরনামেন্টস/গহনার দোকান
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    সেলুন
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মেশিনারিজ এর দোকান
                                </span>
                            </div>


                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    মটরসাইকেল/গাড়ির শোরুম
                                </span>
                            </div>


                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    বৈদ্যুতিক সরঞ্জাম
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    কলকারখানা
                                </span>
                            </div>

                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    রিয়েল এস্টেট
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    কোচিং সেন্টার
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ইন্টারনেট সংযোগ
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    এন জি ও
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    ম্যারেজ মিডিয়া
                                </span>
                            </div>
                            <div class="list_item">
                                <i class="fa fa-check text-success"></i>
                                <span>
                                    বিভিন্ন সার্ভিস প্রতিষ্ঠান
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>

            </div>
    </section>



    {{-- slick slider --}}

    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading text-center">
                        <h2>আমাদের কাস্টমারগণ</h2>
                    </div>
                </div>
            </div>
            <div class="row team-slider">
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/trinomul.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/ict.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/joybarta.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/milki.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/bastramela.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/cristal.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/argo.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/69unique.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/canvas.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/shopno.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/superbrothers.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/university.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/tatka.jpg') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/adventure.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/popular.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/mobileBazar.jpg') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/life.png') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/atuo-dinamic.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/funs&tour.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/hitechpark.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img knowledge-image">
                            <img src="{{ asset('images/client/knowledge.png') }}" alt="team1"
                                class="img-fluid w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('images/client/rupsa.jpg') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="team-img tb-image">
                            <img src="{{ asset('images/client/tb.jpg') }}" alt="team1" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- slick slider end --}}

    <section id="showcase" style=" margin:100px 0px">
        <div class="row">
            <div class="col-lg-12">
                <div class="showcase-text1">
                    <h2>গ্লোরিয়াস পস সফটওয়্যার এর মূল ফিচার এবং ফাংশন সমূহ</h2>
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/invoice.png') }}" alt="" style="width: 93%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>ইনভয়েস, বিল, চালান প্রিন্ট </h2>
                    <p class="lead mb-0">গ্লোরিয়াস পস সফটওয়্যারে মাধ্যমে ক্রেতার বিল, ইনভয়েস, চালান, জমা, খরচের ভাউচার
                        তৈরি ও প্রিন্ট করতে পারবেন।</p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row box">
                <div class="col-lg-6  showcase-text sell-text" style=" padding-top: 80px" data-aos="fade-right">
                    <h2>ক্রয়, বিক্রয়, প্রোডাক্ট স্টক হিসাব ও ইনভেন্টরি ম্যানেজমেন্ট</h2>
                    <p class="lead mb-0">পন্য ক্রয়,বিক্রয়ের হিসাব, কোন সাপ্লাইয়ারের কাছ থেকে কি পন্য, কত পিচ ক্রয় করলেন।
                        সাপ্লাইয়ারকে কত টাকা পেমেন্ট করলেন, কত টাকা পাবে, ক্রেতার কাছে কত টাকার পন্য বিক্রয় করলেন, কত পিচ
                        বিক্রয় করলেন, কত টাকা ক্রেতার কাছে বাকি আছে তার যাবতীয় পূর্নাঙ্গ হিসাব রাখা যাবে গ্লোরিয়াস পস
                        সফটওয়ারে । এডিসকাউন্ট া ও ইনভেন্টরি ম্যানেজমেন্টের মাধ্যমে আপনি জানতে পারবেন আপনার স্টকের সব পন্যের
                        বর্তমান অবস্থা ।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img sells-image" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/sells&buy.png') }}" alt="" style="width: 93%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/due.jpg') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>কাস্টমারের বাকি হিসাব সহ কিস্তিতে বিক্রয় এবং কিস্তির রিমাইন্ডার</h2>
                    <p class="lead mb-0">কোন কাস্টমারের কাছে কত টাকা বাকি থাকলো, কবে কত টাকা পেমেন্ট করল, বর্তমানে কত টাকা
                        বাকি আছে - সকল ধরনের হিসাব রাখতে এবং দেখতে পারবেন এক ক্লিকেই । বিক্রয় করার মুহূর্তেই কাস্টমারের কাছে
                        কত টাকা পাওনা আছে তা দেখতে পারবেন এবং সেই সাথে কাস্টমারের পূর্বের সকল ক্রয় এবং পেমেন্টের হিস্টরি
                        দেখে নিতে পারবেন । ইলেকট্রনিক শপে যেমন ফ্রিজ, টিভি, এসি এসব কিস্তিতে সেল করার প্রয়োজন হয়। সে সময়
                        কাস্টমারের বেশ কিছু অতিরিক্ত তথ্য রাখতে হয় যেমন: কাস্টমারের বর্তমান এবং স্থায়ী ঠিকানা, NID ইত্যাদি
                        আবার রেফারেন্স পার্সনের বিস্তারিত সব কিছু রাখার ব্যবস্থা আছে।
                    </p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>সকল খরচ হিসাব</h2>
                    <p class="lead mb-0">প্রতিষ্ঠানের সকল খরচ এর হেড অনুসারে হিসাব রাখতে পারবেন ।
                        দোকান বা শোরুমে কবে কত টাকা কি বাবদ ব্যয় হলো এবং কার হাতে ব্যয় হলো সব হিসাব রাখতে পারবেন।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/report1.png') }}" alt="" style="width: 93%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">

                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/accounting.png') }}" alt="" style="width: 100%">
                </div>

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>কমপ্লিট একাউন্টিং</h2>
                    <p class="lead mb-0">একাউন্টিং না জানলেও এখন সফটওয়্যার হবে আপনার একাউন্টেন্ট । হিসাব থাকবে সচ্ছ ও
                        সাজানো-গোছানো । এক ক্লিকেই দেখতে পাবেন যে কোনো রিপোর্ট।</p>
                </div>

            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2> এস.এম.এস. পাঠানোর সুবিধা</h2>
                    <p class="lead mb-0">ক্রেতা- বিক্রেতাকে SMS পাঠাতে পারবেন আপনার ইচ্ছামত । বাকি টাকা , কিস্তির টাকা ,
                        ক্রয় সংক্রান্ত ম্যাসেজ বা প্রমোশনাল ম্যাসেজ করা যাবে সফটওয়্যার দিয়ে। </p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/sms.jpg') }}" alt="" style="width: 100%">

                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">

                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/tour.jpg') }}" alt="" style="width: 100%">
                </div>

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>ব্যবসার বাইরে থেকে ও ব্যবসার হিসাব আপনার কাছে থাকবে স্বচ্ছ </h2>
                    <p class="lead mb-0">যেখানেই থাকুন মোবাইল এ্যাপে সার্বক্ষনিক নজর রাখুন আপনার ব্যবসায় । ব্যবসার
                        বিক্রি,স্টক, লাভ-লস ,সব কিছুই দেখতে পাবেন বিশ্বের যে কোন প্রান্ত থেকে । ব্যবসা হবে এখন ডিজিটাল ।
                    </p>
                </div>

            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>অনলাইন এবং অফলাইন</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">আমাদের সফটওয়্যার অনলাইন এবং অফলাইন দুই ভাবেই ব্যবহার করা যায়। আপনার কম্পিউটার বা
                        ল্যাপটপে সফটওয়্যার ইন্সটল করে ইন্টারনেট ছাড়াই ব্যবহার করতে পারবেন এবং অনলাইনে বিশ্বের যে কোনো
                        প্রান্ত থেকে
                        দেখতে পারবেন । </p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/profit.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img imei-image" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/imei1.png') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>সিরিয়াল নম্বর যুক্ত প্রোডাক্ট সহ ওয়ারেন্টি,গ্যারান্টি ম্যানেজমেন্ট</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">প্রোডাক্টের ওয়ারেন্টি থাকলে সেই ওয়ারেন্টি পিরিয়ডটি প্রোডাক্টের প্রফাইলে সেট করতে পারবেন।
                        যেমন: ৬ মাস. ১ বছর. ২ বছর ইত্যাদি। সেটা ইনভয়েসে আসবে। পরে যখন কাস্টমার ওয়ারেন্টি ক্লেইম করতে আসবে
                        তখন ইনভয়েসে সেটা মিলিয়ে নিয়ে দেখতে পারবেন তাই ওয়ারেন্টি বা গ্যারান্টি হবে আরো নিখুত ও ঝামেলাহীন ।
                    </p>
                </div>

            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>দৈনিক/মাসিক লাভ-লোকসানের হিসাব</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">দৈনিক ,মাসিক, বাৎসরিক ব্যবসার লাভ-লোকসানের হিসাব পেয়ে যাবেন। সফটওয়্যারটির মাধ্যমে
                        খুব সহজেই আপনার দোকান বা শোরুমের লাভ-ক্ষতির পরিমাণ হিসাব করতে পারবেন মাত্র কয়েক ক্লিকেই, যা আপনাকে
                        দ্রুত সঠিক ব্যবসায়িক সিদ্ধান্ত নিতে সাহায্য করবে।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/feature_2.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/barcode.png') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 120px" data-aos="fade-left">
                    <h2>বারকোড প্রিন্ট এবং স্ক্যান</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">প্রত্যেকটি নির্দিষ্ট পন্যের জন্য বারকোড, লেবেল তৈরী করতে পারবেন এবং প্রিন্ট করে
                        আপনার পন্যের উপর ব্যবহার করতে পারবেন। </p>
                </div>

            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>প্রোডাক্ট অনুযায়ী লাভ-লোকসানের হিসাব</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">কোন নির্দিষ্ট প্রোডাক্ট বিক্রয়ের মাধ্যমে কত টাকা লাভ হল সেটা যেমন দেখতে পারবেন, তেমনি
                        কোন নির্দিষ্ট দিনে কত টাকা লাভ-লোকসান হল সেটিও দেখতে পারবেন।</p>
                </div>

                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/summary_2.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img discount-image" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/return.png') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>ডিসকাউন্ট,ক্রয় রিটার্ন,বিক্রয় রিটার্ন,ড্যামেজ ম্যানেজমেন্ট</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">সফটওয়্যারের মাধ্যমে পারসেন্ট এবং ক্যাশ উভয় ভাবে ডিসকাউন্ট দেওয়া যাবে।
                        বিক্রির সময় পার্সেন্টেজ অথবা ফিক্সড এ্যামাউন্ট দুইভাবেই ডিসকাউন্ট দেওয়ার সুবিধা রয়েছে। এছাড়া রয়েছে
                        প্রতিটি প্রোডাক্ট অথবা মোট মূল্যের উপর ডিসকাউন্ট দেবার সুবিধা। ।ক্রয় রিটার্ন, বিক্রয় রিটার্ন ,ড্যামেজ
                        প্রোডাক্ট খুব সহজেই ম্যানেজমেন্ট করতে পারবেন।</p>
                </div>

            </div>
        </div>
        <div class="feature_wrapper">
            <div class="row box">

                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-right">
                    <h2>ইউজার এ্যাকসেস কন্ট্রোল</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">
                        সফটওয়্যারটির এ্যাকসেস কন্ট্রোল ফিচারের মাধ্যেমে , কোন ব্যবহারকারী কোন নির্দিষ্ট অংশ ব্যবহার করতে
                        পারবে সেটি আপনি নিয়ন্ত্রন করতে পারবেন।</p>
                </div>
                <div class="col-lg-6 text-white showcase-img" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/manage_user.jpg') }}" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img report-image" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/inventory1.png') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 80px" data-aos="fade-left">
                    <h2>৬০ টির ও বেশি স্বয়ংক্রিয়ভাবে ব্যবসার রিপোর্ট</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">
                        আমাদের সফটওয়্যারে রিপোর্ট স্বয়ংক্রিয়ভাবে হয়।ব্যবসার বর্তমান পরিস্থিতি কি এবং সে অনুযায়ী সঠিক
                        সিদ্ধান্ত নেবার জন্য প্রয়োজন রিপোর্ট, ৬০ টির ও বেশী রিপোর্ট দেখতে পারবেন গ্লোরিয়াস পস সফটওয়্যারে
                        মাধ্যমে । যা আপনাকে সঠিক ব্যবসায়িক সিদ্ধান্ত নিতে সাহায্য করবে ।</p>
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row box">
                <div class="col-lg-6 showcase-text" style="padding-top: 120px" data-aos="fade-right">
                    <h2>ডাটা ব্যাকআপ</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">ডাটা ব্যাকআপ ব্যবস্থা রয়েছে যার মাধ্যমে এক ক্লিকেই ডাটার ব্যাকআপ নিতে পারবেন।
                        Excel ,PDF,CSV, Word ইত্যাদি ভাবে প্রতিদিন শেষে ডাটা ব্যাকআপ নিয়ে রাখলে যেকোন সময় সিস্টেম ক্র্যাশ
                        করলেও পূর্বের সব ডাটা ফেরত পাবেন। </p>
                </div>
                <div class="col-lg-6 text-white showcase-img data-image " data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/backup.png') }}" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="feature_wrapper">
            <div class="row ">
                <div class="col-lg-6 text-white showcase-img data-image " data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/security.png') }}" alt="" width="100%">
                </div>
                <div class="col-lg-6 showcase-text" style="padding-top: 120px" data-aos="fade-left">
                    <h2>সর্বোচ্চ নিরাপত্তা</h2>
                    <p class="lead mb-0">
                    <p class="lead mb-0">আমাদের ক্লাউড কম্পিউটিং সমাধান, আপনার ব্যবসার সব তথ্য গুছিয়ে
                        স্বয়ংক্রিয়ভাবে ব্যাকআপ রাখে, যার ফলে আপনার ব্যবসা থাকবে সম্পূর্ণ নিরাপদ।</p>
                </div>
            </div>
        </div>
    </section>


    {{-- pricing part start --}}

    <section class="pricing_section" style="margin:100px 0px;" id="pricing">
        <div class="row">
            <div class="col-md-12 section_header text-center">
                <h1>প্যাকেজ সমূহ ও নির্ধারিত মূল্য</h1>
                <h4>আপনার ব্যবসার জন্য উপযুক্ত প্যাকেজ টি সাবস্ক্রাইব করে গ্লোরিয়াস আইটির সাথে থাকুন</h4>
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

                <div class="col-md-4 " data-aos="fade-up" data-aos-delay="{{ $delay += 200 }}">
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                            সিরিয়াল নম্বর যুক্ত ম্যানেজমেন্ট
                                        </span>
                                    </div>
                                    <div class="list_item">
                                        <i class="fa fa-check text-success"></i>
                                        <span>
                                            ওয়্যার হাউজ ম্যানেজমেন্ট
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
                                    <a href="{{ route('business.getRegister') }}" class="pricing_btn">

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

    <section id="video">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-gallery">
                    <h2>গ্লোরিয়াস পস নিয়ে কাস্টমারদের রিভিউ</h2>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/cjj7HJxqcKE" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/YPTVC118PhY" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/XqWD1tMxOdQ" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/pulOjQc3ZbI" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/XqWD1tMxOdQ" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mr-right">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/XqWD1tMxOdQ" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    <section id="order">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="order-img">
                                <img src="https://www.gloriousit.com/wp-content/uploads/2021/09/costomer--300x300.png"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="order-text">
                                <h3>
                                    <a href="https://client.gloriousit.xyz/user/register">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Order Now
                                    </a>
                                </h3>
                                <h4>আরো বিস্তারিত জানতে এবং কাস্টমাইজ সফটওয়্যারের জন্য যোগাযোগ করুন</h4>
                                <p>
                                    <img src="{{ asset('images/landing_page/whatsapp.png') }}" alt="">
                                    +8801724721000
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    {{-- -------------------------- messege Icon --------------------------------- --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="whatsapp-image">

                        <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
                        <script>
                            var wa_btnSetting = {
                                "btnColor": "#16BE45",
                                "ctaText": "",
                                "cornerRadius": 40,
                                "marginBottom": 20,
                                "marginLeft": 20,
                                "marginRight": 20,
                                "btnPosition": "left",
                                "whatsAppNumber": "",
                                "welcomeMessage": "Hello",
                                "zIndex": 999999,
                                "btnColorScheme": "light"
                            };
                            window.onload = () => {
                                _waEmbed(wa_btnSetting);
                            };
                        </script>


                    </div>
                    <div class="messenger-image">
                        <!-- Messenger Chat plugin Code -->
                        <div id="fb-root"></div>

                        <!-- Your Chat plugin code -->
                        <div id="fb-customer-chat" class="fb-customerchat">
                        </div>

                        <script>
                            var chatbox = document.getElementById('fb-customer-chat');
                            chatbox.setAttribute("page_id", "114087049369590");
                            chatbox.setAttribute("attribution", "biz_inbox");
                        </script>

                        <!-- Your SDK code -->
                        <script>
                            window.fbAsyncInit = function() {
                                FB.init({
                                    xfbml: true,
                                    version: 'v17.0'
                                });
                            };

                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                    </div>
                </div>
            </div>
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
