@extends('layouts.app')
@section('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.subscription'))

@section('content')

    <!-- Main content -->
    <section class="content">

        @include('superadmin::layouts.partials.currency')

        @php
            $package_id = 0;
            $validity = 0;
            $last_subscription = Modules\Superadmin\Entities\Subscription::where('business_id', auth()->user()->business_id)
                ->orderByDesc('created_at')
                ->first();

            if (!empty($last_subscription)) {
                $package_id = $last_subscription->package_id;
                if ($last_subscription->end_date > \Carbon::today()) {
                    $validity = \Carbon::today()->diffInDays($last_subscription->end_date);
                }
            }
        @endphp

        @if ($last_subscription)
            <div style="display: flex; justify-content: center;">
                <div
                    style="background-color:white; min-width:400px; border-radius: 7px;padding:15px 50px; margin: 40px 0; box-shadow:rgba(0, 0, 0, 0.15) 0px 5px 15px;">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <h4 style="margin-right: 10px;">Package: {{ $last_subscription->package_details['name'] }}</h4>
                        @if ($package_id == 1)
                            <span class="badge" style="height: 18px">
                                @lang('superadmin::lang.trial')
                            </span>
                        @elseif ($validity && $package_id != 1)
                            <span class="badge bg-green" style="height: 18px">
                                @lang('superadmin::lang.active')
                            </span>
                        @else
                            <span class="badge bg-red" style="height: 18px">
                                @lang('superadmin::lang.expired')
                            </span>
                        @endif
                    </div>

                    <div style="display: flex; justify-content:center; align-items:center; margin-top: 15px;">
                        <div>
                            @lang('superadmin::lang.start_date') : {{ @format_date($last_subscription->start_date) }} <br />
                            @lang('superadmin::lang.end_date') : {{ @format_date($last_subscription->end_date) }} <br />

                            @if ($validity)
                                <span style="color:green">
                                    @lang('superadmin::lang.remaining', ['days' => $validity])
                                </span>
                            @else
                                <span style="color:red">
                                    @lang('superadmin::lang.remaining', ['days' => $validity])
                                </span>
                            @endif
                        </div>

                        <div>
                            <a style="font-size:16px; background-color:#e2136e; border:0 solid; margin-right:5px; border-radius:25px; box-shadow:rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:5px 15px; margin-left:20px;"
                                href="{{ action('\Modules\Superadmin\Http\Controllers\SubscriptionController@pay', [$package_id]) }}"
                                title="Pay Bill" data-toggle="tooltip" data-placement="bottom"
                                class="btn btn-sm btn-success">
                                <strong><i class="ion ion-cash"></i>&nbsp; Renew Subscription</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($last_subscription)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('superadmin::lang.all_subscriptions')</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <!-- location table-->
                                <table class="table table-bordered table-hover" id="all_subscriptions_table">
                                    <thead>
                                        <tr>
                                            <th>@lang('superadmin::lang.package_name')</th>
                                            <th>@lang('superadmin::lang.start_date')</th>
                                            <th>@lang('superadmin::lang.trial_end_date')</th>
                                            <th>@lang('superadmin::lang.end_date')</th>
                                            <th>@lang('superadmin::lang.price')</th>
                                            <th>@lang('superadmin::lang.paid_via')</th>
                                            <th>@lang('superadmin::lang.payment_transaction_id')</th>
                                            <th>@lang('superadmin::lang.software_status')</th>
                                            <th>@lang('lang_v1.created_at')</th>
                                            <th>@lang('business.created_by')</th>
                                            <th>Payment Status</th>
                                            <th>@lang('messages.action')</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('superadmin::lang.packages')</h3>
            </div>

            <div class="box-body">
                @include('superadmin::subscription.partials.packages')
            </div>
        </div>

    </section>
@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#all_subscriptions_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ action('\Modules\Superadmin\Http\Controllers\SubscriptionController@allSubscriptions') }}',
                columns: [{
                        data: 'package_name',
                        name: 'P.name'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'trial_end_date',
                        name: 'trial_end_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'package_price',
                        name: 'package_price'
                    },
                    {
                        data: 'paid_via',
                        name: 'paid_via'
                    },
                    {
                        data: 'payment_transaction_id',
                        name: 'payment_transaction_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'created_by',
                        name: 'created_by'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                ],
                "fnDrawCallback": function(oSettings) {
                    __currency_convert_recursively($('#all_subscriptions_table'), true);
                }
            });
        });
    </script>
@endsection
