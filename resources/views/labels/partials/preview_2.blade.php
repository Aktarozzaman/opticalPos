<table align="center" style="border-spacing:{{ $barcode_details->col_distance * 1 }}in {{ $barcode_details->row_distance * 1 }}in; overflow: hidden !important;">
    @foreach ($page_products as $page_product)
        @if ($loop->index % $barcode_details->stickers_in_one_row == 0)
            <!-- create a new row -->
            <tr>
                <!-- <columns column-count="{{ $barcode_details->stickers_in_one_row }}" column-gap="{{ $barcode_details->col_distance * 1 }}"> -->
                @endif
                <td align="center" valign="center">
                    <div style="overflow: hidden !important;display: flex; flex-wrap: wrap;align-content: center;width: {{ $barcode_details->width * 1 }}in; height: {{ $barcode_details->height * 1 }}in; justify-content: center;">
                        <div>

                            {{-- Business Name --}}
                            @if (!empty($print['business_name']))
                                <b style="display: block !important; font-size:{{ $print['business_name_size'] }}px"><b> {{ $business_name }}</b></b>
                            @endif
                            {{-- Product Name --}}
                            @if (!empty($print['name']))
                                <b>
                                <span style="display: block !important; font-size:{{ $print['name_size'] }}px ; margin-bottom: 1"> {{ $page_product->product_actual_name }}

                                    @if (!empty($print['lot_number']) && !empty($page_product->lot_number))
                                        <span style="font-size: {{ 12 * $factor }}px"> ({{ $page_product->lot_number }}) </span>
                                    @endif
                             </span>
                                    @endif

                                    {{-- Variation --}}
                                    @if (!empty($print['variations']) && $page_product->is_dummy != 1)
                                        <span style="display: block !important; font-size:{{ $print['variations_size'] }}px">
                            {{ $page_product->product_variation_name }} : <b>{{ $page_product->variation_name }}</b>
                            </span>
                                    @endif

                                    {{-- Price --}}
                                    @if (!empty($print['price']))
                                        <span style="font-size:{{ $print['price_size'] }}px;">
                               <b> @lang('lang_v1.price'):
                                {{ session('currency')['symbol'] ?? '' }}
                                   @if ($print['price_type'] == 'inclusive')
                                       {{ @num_format($page_product->sell_price_inc_tax) }}
                                   @else
                                       {{ @num_format($page_product->default_sell_price) }}
                                   @endif
                                    </b>
                                </span>
                                    @endif
                                    @if (!empty($print['show_vat']))
                                        <span style="font-size:{{ $print['show_vat_size'] }}px;">
                            <b>
                                + VAT
                            </b>
                                 </span>
                                    @endif

                                    {{-- product custom label  --}}
                                    @if (!empty($print['product_custom_label']) && $page_product->product_custom_field1 != '')
                                        <span style="display: block; font-size:{{ $print['product_custom_label_size'] }}px"><b> {{ $page_product->product_custom_field1 }}</b>
                            @endif

                                            {{-- print barcode custom label  --}}
                                            @if (!empty($print['custom_label_check']) && $print['custom_label'] != '')
                                                <br> <span
                                                        style="display: block; font-size:{{ $print['custom_label_size'] }}px">
                                            <b>{{ $print['custom_label'] }} </b>
                                            @endif


                                                    @if (!empty($print['exp_date']) && !empty($page_product->exp_date))
                                                        <br>
                                                        <span style="font-size:{{ $print['exp_date_size'] }}px"> <b>@lang('product.exp_date'):</b>
                                                    {{ $page_product->exp_date }}
                                                </span>
                                                        @if ($barcode_details->is_continuous)
                                                            <br>
                                                        @endif
                                                    @endif

                                                    @if (!empty($print['packing_date']) && !empty($page_product->packing_date))
                                                        <br><span style="font-size:{{ $print['packing_date_size'] }}px">
                                                <b>@lang('lang_v1.packing_date'):</b>
                                            {{ $page_product->packing_date }}
                                                </span>
                                                    @endif
                                                    {{-- Barcode --}}
                    <img style="width:48% !important;height:{{ $barcode_details->height * 0.17 }}in !important; display: block;"
                         src="data:image/svg+xml;base64,{{ base64_encode(DNS1D::getBarcodeSVG($page_product->sub_sku, $page_product->barcode_type, 2, 30, 'black', true, false)) }}" />

                    <span style="font-size: 10px !important">
                        <b> {{ $page_product->sub_sku }}</b>
                    </span>
                        </div>
                    </div>

                </td>

                @if ($loop->iteration % $barcode_details->stickers_in_one_row == 0)
            </tr>
        @endif
    @endforeach
</table>

<style type="text/css">
    td {
        border: 1px dotted lightgray;
    }

    * {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 700;
        word-break: break-all;
    }

    @media print {

        table {
            page-break-after: always;
        }

        .shop-copy {
            page-break-after: always;
        }

        body {
            margin-top: 0;
            margin-left: 0;
            margin-bottom: 0;
        }


        @page {
            size: {{ $paper_width }}in {{ $paper_height }}in;

            /*width:

        {{ $barcode_details->paper_width }}in !important;*/
            /*height:

        @if ($barcode_details->paper_height != 0)
                            {{ $barcode_details->paper_height }}in !important


        @else

                @endif
*/
            margin-top: {{ $margin_top }}in !important;
            margin-bottom: {{ $margin_top }}in !important;
            margin-left: {{ $margin_left }}in !important;
            margin-right: {{ $margin_left }}in !important;
        }
    }
</style>
