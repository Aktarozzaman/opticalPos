@extends('layouts.guest')
@section('title', 'invoice')
@section('css')

    <style type="text/css">
        .f-8 {
            font-size: 8px !important;
        }

        /*@media print {*/
            * {
                font-family: "Montserrat", sans-serif;
                font-optical-sizing: auto;
                font-weight: 700;
                font-size: 12px;

                /*font-family: 'Times New Roman';*/
                word-break: break-all;
            }

            .f-8 {
                font-size: 8px !important;
            }

            .headings {
                font-size: 16px;
                font-weight: 700;
                text-transform: uppercase;
                white-space: nowrap;
            }

            .sub-headings {
                font-size: 15px !important;
                font-weight: 700 !important;
            }

            .border-top {
                border-top: 1px solid #242424;
            }

            .border-bottom {
                border-bottom: 1px solid #242424;
            }

            .border-bottom-dotted {
                border-bottom: 1px dotted rgba(17, 16, 16, 0.87);
            }

            .border-dotted {
                border-bottom: 1px dotted rgba(17, 16, 16, 0.87);
            }

            .border {
                border: 1px rgba(17, 16, 16, 0.87);
            }

            td.serial_number,
            th.serial_number {
                width: 5%;
                max-width: 5%;
            }

            td.description,
            th.description {
                width: 35%;
                max-width: 35%;
            }

            td.quantity,
            th.quantity {
                width: 15%;
                max-width: 15%;
                word-break: break-all;
            }

            td.unit_price,
            th.unit_price {
                width: 25%;
                max-width: 25%;
                word-break: break-all;
            }

            td.price,
            th.price {
                width: 20%;
                max-width: 20%;
                word-break: break-all;
            }

            .centered {
                text-align: center;
                align-content: center;
            }

            .ticket {
                width: 100%;
                max-width: 100%;
            }

            img {
                max-width: inherit;
                width: auto;
            }

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        .table-info {
            width: 100%;
        }

        .table-info tr:first-child td,
        .table-info tr:first-child th {
            padding-top: 8px;
        }

        .table-info th {
            text-align: center;
        }

        .table-info td {
            text-align: center;
        }

        .logo {
            float: left;
            width: 35%;
            padding: 10px;
        }

        .text-with-image {
            float: left;
            width: 65%;
        }

        .text-box {
            width: 100%;
            height: auto;
        }

        .textbox-info {
            clear: both;
        }

        .textbox-info p {
            margin-bottom: 0px
        }

        .flex-box {
            display: flex;
            width: 100%;
        }

        .flex-box p {
            width: 50%;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .table-f-12 th,
        .table-f-12 td {
            font-size: 12px;
            word-break: break-word;
        }

        .bw {
            word-break: break-word;
        }
        .container {
            margin: 5px;
            padding: 5px;
            border: 1px solid black;
        }
        .no-float {
            float: none;
        }
        table, thead, th, td {
            width: 100%;
            border: 1px solid rgba(17, 16, 16, 0.87);
        }
        tr,th{
            text-align: center;
        }
    </style>

@endsection
@section('content')
    <div style="padding: 4rem;">
    <div class="spacer"></div>
    <div class="row">
        <div class="col-md-12 text-right" >
            <button type="button" class="btn btn-primary no-print" id="print_invoice" 
                 aria-label="Print"><i class="fas fa-print"></i> @lang( 'messages.print' )
            </button>
            @auth
                <a href="{{action('SellController@index')}}" class="btn btn-success no-print" ><i class="fas fa-backward"></i>
                </a>
            @endauth
        </div>
    </div>
            <div id="invoice_content">
                {!! $receipt['html_content'] !!}
            </div>
</div>
@stop
@section('javascript')
    <script type="text/javascript">
        $(window).click('print_invoice',function(){
            $('#invoice_content').printThis();

        });
        window.addEventListener("afterprint", function() {
            window.close()
        });
        @if(!empty(request()->input('print_on_load')))
        $(window).on('load', function() {
            // Print the invoice content
            $('#invoice_content').printThis();
        });
        @endif
    </script>
@endsection
