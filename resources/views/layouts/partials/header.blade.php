@inject('request', 'Illuminate\Http\Request')
<!-- Main Header -->
<header class="main-header no-print">
    <a href="{{ route('home') }}" class="logo">
        <span class="logo-lg">{{ Session::get('business.name') }} <i class="fa fa-circle text-success"
                id="online_indicator"></i></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            &#9776;
            <span class="sr-only">Toggle navigation</span>
        </a>

        @if (Module::has('Superadmin'))
            @includeIf('superadmin::layouts.partials.active_subscription')
        @endif


        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

            @if (Module::has('Essentials'))
                @includeIf('essentials::layouts.partials.header_part')
            @endif

            <div class="btn-group">
                {{-- <button id="header_shortcut_dropdown" type="button" class="btn btn-success dropdown-toggle pull-left m-8 btn-sm mt-10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus-circle fa-lg"></i>
          </button> --}}
                <ul class="dropdown-menu">
                    @if (config('app.env') != 'demo')
                        <li><a href="{{ route('calendar') }}">
                                <i class="fas fa-calendar-alt" aria-hidden="true"></i> @lang('lang_v1.calendar')
                            </a></li>
                    @endif
                    @if (Module::has('Essentials'))
                        <li><a href="#" class="btn-modal"
                                data-href="{{ action('\Modules\Essentials\Http\Controllers\ToDoController@create') }}"
                                data-container="#task_modal">
                                <i class="fas fa-clipboard-check" aria-hidden="true"></i> @lang('essentials::lang.add_to_do')
                            </a></li>
                    @endif
                    <!-- Help Button -->
                    @if (auth()->user()->hasRole('Admin#' . auth()->user()->business_id))
                        <li><a id="start_tour" href="#">
                                <i class="fas fa-question-circle" aria-hidden="true"></i> @lang('lang_v1.application_tour')
                            </a></li>
                    @endif
                </ul>
            </div>
            {{-- <button id="btnCalculator" title="@lang('lang_v1.calculator')" type="button" class="btn btn-info pull-left m-8 btn-sm mt-10 popover-default hidden-xs" data-toggle="popover" data-trigger="click" data-content='@include("layouts.partials.calculator")' data-html="true" data-placement="bottom">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>pa
        </button> --}}

            @if ($request->segment(1) == 'pos')
                @can('view_cash_register')
                    <button type="button" id="register_details" title="{{ __('cash_register.register_details') }}"
                        data-toggle="tooltip" data-placement="bottom"
                        class="btn btn-info pull-left m-8 btn-sm mt-10 btn-modal" data-container=".register_details_modal"
                        data-href="{{ action('CashRegisterController@getRegisterDetails') }}">
                        <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
                    </button>
                @endcan
                @can('close_cash_register')
                    <button type="button" id="close_register" title="{{ __('cash_register.close_register') }}"
                        data-toggle="tooltip" data-placement="bottom"
                        class="btn btn-info pull-left m-8 btn-sm mt-10 btn-modal" data-container=".close_register_modal"
                        data-href="{{ action('CashRegisterController@getCloseRegister') }}">
                        <strong><i class="fa fa-window-close fa-lg"></i></strong>
                    </button>
                @endcan
            @endif

            @php
                $package_id = 0;
                $last_subscription = Modules\Superadmin\Entities\Subscription::where('business_id', auth()->user()->business_id)
                    ->orderByDesc('created_at')
                    ->first();

                if (!empty($last_subscription)) {
                    $package_id = $last_subscription->package_id;
                }
            @endphp

            <a style="font-size: 12px; background-color: #e2136e; border:1px solid #fff; margin-right: 5px;"
                href="{{ action('\Modules\Superadmin\Http\Controllers\SubscriptionController@pay', [$package_id]) }}"
                title="Pay Bill" data-toggle="tooltip" data-placement="bottom"
                class="btn pull-left btn-sm mt-18 btn-success">
                <strong><i class="ion ion-cash"></i>&nbsp; Pay Bill </strong>
            </a>

            @can('purchase.create')
                <a style=" font-size: 12px; background-color: #8BC34A; margin-right: 5px; border: 1px solid #fff;"
                    href="{{ action('PurchaseController@create') }}" title="@lang('purchase.add_purchase')" data-toggle="tooltip"
                    data-placement="bottom" class="btn pull-left btn-sm mt-18 btn-success">
                    <strong><i class="fa fa-shopping-bag"></i> &nbsp; PURCHASE</strong>
                </a>
            @endcan

            @if (in_array('pos_sale', $enabled_modules))
                @can('sell.create')
                    <a style=" font-size: 13px; background-color: #b22222; margin-right: 5px; border: 1px solid #fff; "
                        href="{{ action('SellPosController@create') }}" title="@lang('sale.pos_sale')" data-toggle="tooltip"
                        data-placement="bottom" class="btn pull-left btn-sm mt-18 btn-success">
                        <strong><i class="fa fa-shopping-cart"></i> &nbsp; SALE</strong>
                    </a>
                @endcan
            @endif

            @if (Module::has('Repair'))
                @includeIf('repair::layouts.partials.header')
            @endif

            @can('profit_loss_report.view')
                <button type="button" id="view_todays_profit" title="{{ __('home.todays_profit') }}" data-toggle="tooltip"
                    data-placement="bottom" class="btn pull-left btn-sm mt-18 btn-success" style="font-size: 12px; margin-bottom: 2px; border: 1px solid #fff;">
                    <strong><i class="fas fa-dollar-sign fa-lg"></i> &nbsp; PROFIT</strong>
                </button>
            @endcan
            @php
                $birthDays = App\Contact::whereDay('dob', date('d'))
                    ->whereMonth('dob', date('m'))
                    ->where('dob', '!=', null)
                    ->where('wish_date', null)
                    ->orWhereYear('wish_date', '!=', date('Y'))
                    ->count('id');
            @endphp
            {{-- <a href="{{ route('birthdaylist') }}" title="{{ __('Birth day list') }}" data-toggle="tooltip"
                data-placement="bottom" class="btn pull-left btn-sm mt-18 btn-success">
                <strong><i class="fa fa-gift"></i> &nbsp; {{ __('Birth Day') }}
                    ({{ $birthDays ? $birthDays : 0 }})</strong>
            </a> --}}

            @php

                $config_languages = config('constants.langs');
                $languages = [];
                foreach ($config_languages as $key => $value) {
                    $languages[$key] = $value['full_name'];
                }
            @endphp

            {!! Form::open([
                'url' => action('UserController@updateLanguage'),
                'method' => 'post',
                'id' => 'update_lang_form',
            ]) !!}

            {!! Form::select(
                'lang_select',
                $languages,
                request()->session()->get('user.language'),
                [
                    'id' => 'lang_select',
                    'style' =>
                        'border: 1px solid #FFF;  padding: 5px 7px; border-radius: 3px;  margin-left: 4px; background: #8BC34A; color: white; margin-bottom:2px;',
                ],
            ) !!}

            {!! Form::close() !!}

            {{-- <div class="m-8 pull-left mt-15 hidden-xs" style="color: #fff;"><strong>{{ @format_date('now') }}</strong></div> --}}

            <ul class="nav navbar-nav">
                @include('layouts.partials.header-notifications')
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @php
                            $profile_photo = auth()->user()->media;
                        @endphp
                        @if (!empty($profile_photo))
                            <img src="{{ $profile_photo->display_url }}" class="user-image" alt="User Image">
                        @else
                            <img src="{{ asset('uploads/default-user.png') }}" class="user-image" alt="User Image">
                        @endif
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        {{-- <span>{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</span> --}}
                    </a>
                    <ul class="dropdown-menu navbar-logout-menu">
                        <li class="treeview"><a href="{{ action('UserController@getProfile') }}"
                                class="dropdown-item has-icon">
                                <i class="fas fa-user"></i> @lang('lang_v1.profile')
                            </a>
                        </li>
                        <li class="treeview"><a href="{{ action('Auth\LoginController@logout') }}"
                                class="dropdown-item has-icon">
                                <i class="fas fa-sign-out-alt"></i> @lang('lang_v1.sign_out')
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
