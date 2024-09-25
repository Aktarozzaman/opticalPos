@extends('layouts.app')
@section('title', __('home.home'))

@section('content')

    <style>
        .marque_section {
            height: 17px;
            display: flex;
            align-items: center;
        }

        marquee {
            font-size: 18px;
            font-weight: 600;
            color: #0d7a37;
            font-family: sans-serif;
        }
    </style>




    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 0 0 185px">
        {{-- <h1>{{ __('home.welcome_message', ['name' => Session::get('user.first_name')]) }}
    </h1> --}}
    </section>



    <!-- Main content -->
    <section class="content content-custom no-print">
        <br>

        @if (auth()->user()->can('dashboard.data'))
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <h4 style="font-weight: bold; color: red;">
                        {{ date('l, d M Y, ') }}
                        <span id="clock"></span>


                    </h4>

                    @if (count($all_locations) > 1)
                        {!! Form::select('dashboard_location', $all_locations, null, [
                            'class' => 'form-control select2',
                            'placeholder' => __('lang_v1.select_location'),
                            'id' => 'dashboard_location',
                        ]) !!}
                    @endif
                </div>

                <div class="col-md-8 col-xs-12" style="display: flex; justify-content: end;">

                    {{--                    <a href="https://www.youtube.com/watch?v=VOMTLkZmeKA&list=PL9IzF4wUqEbu347gIDe-7g8WGvRuGVfU2"--}}
                    {{--                        style="padding-top: 8px;color: #f5365c;padding-right: 10px;font-size: 20px;" target="_blank">ভিডিও--}}
                    {{--                        টিউটোরিয়াল</a>--}}

                    {{-- <div data-toggle="buttons">



                        <label class="btn btn-success active" style="margin-right: 5px">
                            <input type="radio" name="date-filter" data-start="{{ date('Y-m-d') }}"
                                data-end="{{ date('Y-m-d') }}" checked> {{ __('home.today') }}
                        </label>
                        <label class="btn btn-success" style="margin-right: 5px">
                            <input type="radio" name="date-filter" data-start="{{ $date_filters['this_week']['start'] }}"
                                data-end="{{ $date_filters['this_week']['end'] }}"> {{ __('home.this_week') }}
                        </label>
                        <label class="btn btn-success" style="margin-right: 5px">
                            <input type="radio" name="date-filter" data-start="{{ $date_filters['this_month']['start'] }}"
                                data-end="{{ $date_filters['this_month']['end'] }}"> {{ __('home.this_month') }}
                        </label>
                        <label class="btn btn-success" style="margin-right: 5px">
                            <input type="radio" name="date-filter" data-start="{{ $date_filters['this_fy']['start'] }}"
                                data-end="{{ $date_filters['this_fy']['end'] }}"> {{ __('home.this_fy') }}
                        </label>

                </div> --}}

                    <div class="form-group pull-right">
                        <div class="input-group">
                            <button type="button" class="btn btn-primary" id="dashboard_date_filter">
                                <span>
                                    <i class="fa fa-calendar"></i> {{ __('messages.filter_by_date') }}
                                </span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                        </div>
                    </div>


                </div>

            </div>

            @if ($notice_message != '' && !empty($notice_message))
                <section class="marque_section">
                    <marquee>{!! $notice_message !!}.</marquee>
                </section>
            @endif


            <br>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #007bff">
                        <span class="info-box-icon" style="background-color: #ffffff; color:#007bff"><i
                                    class="ion ion-ios-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #ffffff">{{ __('home.total_sell') }}</span>
                            <span class="info-box-number total_sell" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->


                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #3335b4">
                        <span class="info-box-icon " style="background-color: #ffffff; color:#3335b4">
                            <i class="ion ion-ios-paper-outline"></i>

                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #ffffff">{{ __('Net Profit') }}
                                @show_tooltip(__('lang_v1.net_home_tooltip'))</span>
                            <span class="info-box-number net" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>


                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #aa0074">
                        <span class="info-box-icon " style="background-color: #ffffff; color:#aa0074">
                            <i class="ion ion-ios-paper-outline"></i>
                            <i class="fa fa-exclamation"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #ffffff">{{ __('Sales Due') }}</span>
                            <span class="info-box-number invoice_due" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- expense -->
                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #a80011">
                        <span class="info-box-icon" style="background-color: #ffffff; color:#9b0010">
                            <i class="fas fa-minus-circle"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #ffffff">
                                {{ __('lang_v1.expense') }}
                            </span>
                            <span class="info-box-number total_expense" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>



                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #03ab62">
                        <span class="info-box-icon " style="background-color: #ffffff; color:#03ab62"><i
                                    class="ion ion-cash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"
                                  style="color: #ffffff; font-weight:bold">{{ __('home.total_purchase') }}</span>
                            <span class="info-box-number total_purchase" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #949901">
                        <span class="info-box-icon " style="background-color: #ffffff; color:#949901">
                            <i class="fa fa-dollar"></i>
                            <i class="fa fa-exclamation"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #fdfffe">{{ __('home.purchase_due') }}</span>
                            <span class="info-box-number purchase_due" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #008ca1">
                        <span class="info-box-icon " style="background-color: #ffffff; color:#0094ab">
                            <i class="fas fa-undo-alt"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text"
                                  style="color: #ffffff">{{ __('lang_v1.total_purchase_return') }}</span>
                            <span class="info-box-number total_purchase_return" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                        <p class="mb-0 text-muted fs-10 mt-5" style="color: #fef5f5">
                            {{ __('lang_v1.total_purchase_return') }}: <span class="total_pr"></span><br>
                            {{ __('lang_v1.total_purchase_return_paid') }}: <span class="total_prp"></span></p>
                    </div>
                    <!-- /.info-box -->
                </div>


                <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                    <div class="info-box info-box-new-style" style="background-color: #c23a00">
                        <span class="info-box-icon" style="background-color: #ffffff; color:#c23a00">
                            <i class="fas fa-exchange-alt"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text"
                                  style="color: #ffffff">{{ __('lang_v1.total_sell_return') }}</span>
                            <span class="info-box-number total_sell_return" style="color: #ffffff"><i
                                        class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                        <p class="mb-0 text-muted fs-10 mt-5" style="color: #ffffff">
                            {{ __('lang_v1.total_sell_return') }}: <span class="total_sr"></span><br>
                            {{ __('lang_v1.total_sell_return_paid') }}: <span class="total_srp"></span></p>
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            Top 5 Products ({{ date('M Y') }})
                        </div>

                        <div class="box-body" style="max-height: 270px; min-height:270px; overflow-y:auto">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="box box-primary">
                        <div class="box-header">Top 10 Customers ({{ date('M Y') }})</div>
                        <div class="box-body" style="max-height: 270px; min-height:270px; overflow-y:auto">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Total Amount Spent</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($topContacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <div class="d-flex justify-content-between aling-items-center">
                                                <img src="{{ asset('images/user.png') }}" alt=""
                                                     style="width:30px">
                                                <span class="ml-2">{{ $contact->contact->name }}</span>
                                            </div>

                                        </td>
                                        <td>{{ $contact->contact->mobile }}</td>
                                        <td><span class="display_currency"
                                                  data-currency_symbol="true">{{ $contact->total_sum }}</span></td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
            @if (!empty($widgets['after_sale_purchase_totals']))
                @foreach ($widgets['after_sale_purchase_totals'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif
            @if (!empty($all_locations))
                <!-- sales chart start -->
                <div class="row">
                    <div class="col-sm-12">
                        @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_last_30_days')])
                            {!! $sells_chart_1->container() !!}
                        @endcomponent
                    </div>
                </div>
            @endif
            @if (!empty($widgets['after_sales_last_30_days']))
                @foreach ($widgets['after_sales_last_30_days'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif
            @if (!empty($all_locations))
                <div class="row">
                    <div class="col-sm-12">
                        @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_current_fy')])
                            {!! $sells_chart_2->container() !!}
                        @endcomponent
                    </div>
                </div>
            @endif
            <!-- sales chart end -->
            @if (!empty($widgets['after_sales_current_fy']))
                @foreach ($widgets['after_sales_current_fy'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif
            <!-- products less than alert quntity -->
            <div class="row">
                <div class="col-sm-6">
                    @component('components.widget', ['class' => 'box-warning'])
                        @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                        @endslot
                        @slot('title')
                            {{ __('lang_v1.sales_payment_dues') }} @show_tooltip(__('lang_v1.tooltip_sales_payment_dues'))
                        @endslot
                        <table class="table table-bordered table-striped" id="sales_payment_dues_table">
                            <thead>
                            <tr>
                                <th>@lang('contact.customer')</th>
                                <th>@lang('sale.invoice_no')</th>
                                <th>@lang('home.due_amount')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>
                        </table>
                    @endcomponent
                </div>
                <div class="col-sm-6">
                    @component('components.widget', ['class' => 'box-warning'])
                        @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                        @endslot
                        @slot('title')
                            {{ __('lang_v1.purchase_payment_dues') }} @show_tooltip(__('tooltip.payment_dues'))
                        @endslot
                        <table class="table table-bordered table-striped" id="purchase_payment_dues_table">
                            <thead>
                            <tr>
                                <th>@lang('purchase.supplier')</th>
                                <th>@lang('purchase.ref_no')</th>
                                <th>@lang('home.due_amount')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>
                        </table>
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="@if (session('business.enable_product_expiry') != 1 &&
                        auth()->user()->can('stock_report.view')) col-sm-12 @else col-sm-6 @endif">
                    @component('components.widget', ['class' => 'box-warning'])
                        @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                        @endslot
                        @slot('title')
                            {{ __('home.product_stock_alert') }} @show_tooltip(__('tooltip.product_stock_alert'))
                        @endslot
                        <table class="table table-bordered table-striped" id="stock_alert_table" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>@lang('sale.product')</th>
                                <th>@lang('business.location')</th>
                                <th>@lang('report.current_stock')</th>
                            </tr>
                            </thead>
                        </table>
                    @endcomponent
                </div>
                @can('stock_report.view')
                    @if (session('business.enable_product_expiry') == 1)
                        <div class="col-sm-6">
                            @component('components.widget', ['class' => 'box-warning'])
                                @slot('icon')
                                    <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                                @endslot
                                @slot('title')
                                    {{ __('home.stock_expiry_alert') }} @show_tooltip( __('tooltip.stock_expiry_alert', [ 'days'
                                    =>session('business.stock_expiry_alert_days', 30) ]) )
                                @endslot
                                <input type="hidden" id="stock_expiry_alert_days"
                                       value="{{ \Carbon::now()->addDays(session('business.stock_expiry_alert_days', 30))->format('Y-m-d') }}">
                                <table class="table table-bordered table-striped" id="stock_expiry_alert_table">
                                    <thead>
                                    <tr>
                                        <th>@lang('business.product')</th>
                                        <th>@lang('business.location')</th>
                                        <th>@lang('report.stock_left')</th>
                                        <th>@lang('product.expires_in')</th>
                                    </tr>
                                    </thead>
                                </table>
                            @endcomponent
                        </div>
                    @endif
                @endcan
            </div>
            @if (auth()->user()->can('list_quotations'))
                <div class="row" @if (!auth()->user()->can('dashboard.data')) style="margin-top: 190px !important;" @endif>
                    <div class="col-sm-12">
                        @component('components.widget', ['class' => 'box-warning'])
                            @slot('icon')
                                <i class="fas fa-list-alt text-yellow fa-lg" aria-hidden="true"></i>
                            @endslot
                            @slot('title')
                                {{ __('lang_v1.sales_order') }}
                            @endslot
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ajax_view" id="sales_order_table">
                                    <thead>
                                    <tr>
                                        <th>@lang('messages.action')</th>
                                        <th>@lang('messages.date')</th>
                                        <th>@lang('restaurant.order_no')</th>
                                        <th>@lang('sale.customer_name')</th>
                                        <th>@lang('lang_v1.contact_no')</th>
                                        <th>@lang('sale.location')</th>
                                        <th>@lang('sale.status')</th>
                                        <th>@lang('lang_v1.shipping_status')</th>
                                        <th>@lang('lang_v1.quantity_remaining')</th>
                                        <th>@lang('lang_v1.added_by')</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        @endcomponent
                    </div>
                </div>
            @endif

            @if (!empty($common_settings['enable_purchase_order']))
                <div class="row" @if (!auth()->user()->can('dashboard.data')) style="margin-top: 190px !important;" @endif>
                    <div class="col-sm-12">
                        @component('components.widget', ['class' => 'box-warning'])
                            @slot('icon')
                                <i class="fas fa-list-alt text-yellow fa-lg" aria-hidden="true"></i>
                            @endslot
                            @slot('title')
                                @lang('lang_v1.purchase_order')
                            @endslot
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ajax_view" id="purchase_order_table"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>@lang('messages.action')</th>
                                        <th>@lang('messages.date')</th>
                                        <th>@lang('purchase.ref_no')</th>
                                        <th>@lang('purchase.location')</th>
                                        <th>@lang('purchase.supplier')</th>
                                        <th>@lang('sale.status')</th>
                                        <th>@lang('lang_v1.quantity_remaining')</th>
                                        <th>@lang('lang_v1.added_by')</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        @endcomponent
                    </div>
                </div>
            @endif
            @if (!empty($widgets['after_dashboard_reports']))
                @foreach ($widgets['after_dashboard_reports'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif
        @else

            <!-- Content Header (Page header) -->
            <section class="content-header" style="padding: 0 0 185px">
                <h1>{{ __('home.welcome_message', ['name' => Session::get('user.first_name')]) }}
                </h1>
            </section>

        @endif
    </section>
    <!-- /.content -->
    <div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade edit_pso_status_modal" tabindex="-1" role="dialog"></div>
    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
@stop
@section('javascript')
    <script src="{{ asset('js/home.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
    @includeIf('sales_order.common_js')
    @includeIf('purchase_order.common_js')
    @if (!empty($all_locations))
        {!! $sells_chart_1->script() !!}
        {!! $sells_chart_2->script() !!}
    @endif
    <script type="text/javascript">
        sales_order_table = $('#sales_order_table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "75vh",
            scrollX: true,
            scrollCollapse: true,
            aaSorting: [
                [1, 'desc']
            ],
            "ajax": {
                "url": '/sells?sale_type=sales_order',
                "data": function(d) {
                    d.for_dashboard_sales_order = true;
                }
            },
            columnDefs: [{
                "targets": 7,
                "orderable": false,
                "searchable": false
            }],
            columns: [{
                data: 'action',
                name: 'action'
            },
                {
                    data: 'transaction_date',
                    name: 'transaction_date'
                },
                {
                    data: 'invoice_no',
                    name: 'invoice_no'
                },
                {
                    data: 'conatct_name',
                    name: 'conatct_name'
                },
                {
                    data: 'mobile',
                    name: 'contacts.mobile'
                },
                {
                    data: 'business_location',
                    name: 'bl.name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'shipping_status',
                    name: 'shipping_status'
                },
                {
                    data: 'so_qty_remaining',
                    name: 'so_qty_remaining',
                    "searchable": false
                },
                {
                    data: 'added_by',
                    name: 'u.first_name'
                },
            ]
        });
        @if (!empty($common_settings['enable_purchase_order']))
        $(document).ready(function() {
            //Purchase table
            purchase_order_table = $('#purchase_order_table').DataTable({
                processing: true,
                serverSide: true,
                aaSorting: [
                    [1, 'desc']
                ],
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                ajax: {
                    url: '{{ action('PurchaseOrderController@index') }}',
                    data: function(d) {
                        d.from_dashboard = true;
                    },
                },
                columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'ref_no',
                        name: 'ref_no'
                    },
                    {
                        data: 'location_name',
                        name: 'BS.name'
                    },
                    {
                        data: 'name',
                        name: 'contacts.name'
                    },
                    {
                        data: 'status',
                        name: 'transactions.status'
                    },
                    {
                        data: 'po_qty_remaining',
                        name: 'po_qty_remaining',
                        "searchable": false
                    },
                    {
                        data: 'added_by',
                        name: 'u.first_name'
                    }
                ]
            });
        })
        @endif
    </script>


    <script>
        var currentDate = new Date();
        var options = {
            year: 'numeric',
            month: 'long'
        };
        var formattedDate = currentDate.toLocaleString('en-US', options);

        var xValues = {!! json_encode(@$product_labels) !!};
        var yValues = {!! json_encode(@$product_values) !!};

        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Top 5 Products based on sells (" + formattedDate + ")"
                }
            }
        });
    </script>

@endsection
