@extends('layouts.app')
@section('title', __('barcode.print_labels'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <br>
        <h1>@lang('barcode.print_labels') @show_tooltip(__('tooltip.print_label'))</h1>
        <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol> -->
    </section>

    <!-- Main content -->
    <section class="content no-print">
        {!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'preview_setting_form', 'onsubmit' => 'return false']) !!}
        @component('components.widget', ['class' => 'box-primary', 'title' => __('product.add_product_for_labels')])
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            {!! Form::text('search_product', null, [
                                'class' => 'form-control',
                                'id' => 'search_product_for_label',
                                'placeholder' => __('lang_v1.enter_product_name_to_print_labels'),
                                'autofocus',
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <table class="table table-bordered table-striped table-condensed" id="product_table">
                        <thead>
                        <tr>
                            <th>@lang('barcode.products')</th>
                            <th>@lang('barcode.no_of_labels')</th>
                            @if (request()->session()->get('business.enable_lot_number') == 1)
                                <th>@lang('lang_v1.lot_number')</th>
                            @endif
                            @if (request()->session()->get('business.enable_product_expiry') == 1)
                                <th>@lang('product.exp_date')</th>
                            @endif
                            <th>@lang('lang_v1.packing_date')</th>
                            <th>@lang('lang_v1.selling_price_group')</th>
                            <th style="width: 40px"><i class="fa fa-trash" aria-hidden="true"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('labels.partials.show_table_rows', ['index' => 0])
                        </tbody>
                    </table>
                </div>
            </div>
        @endcomponent

        @component('components.widget', ['class' => 'box-primary', 'title' => __('barcode.info_in_labels')])
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="print[name]" value="1">
                                        <b>@lang('barcode.print_name')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[name_size]" value="10">
                                </div>
                            </td>

                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="print[variations]" value="1">
                                        <b>@lang('barcode.print_variations')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[variations_size]" value="10">
                                </div>
                            </td>

                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="print[price]" value="1" id="is_show_price">
                                        <b>@lang('barcode.print_price')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[price_size]" value="10">
                                </div>

                            </td>

                            <td>
                                <div class="" id="price_type_div">
                                    <div class="form-group">
                                        {!! Form::label('print[price_type]', @trans('barcode.show_price') . ':') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-info"></i>
                                            </span>
                                            {!! Form::select(
                                                'print[price_type]',
                                                ['inclusive' => __('product.inc_of_tax'), 'exclusive' => __('product.exc_of_tax')],
                                                'inclusive',
                                                ['class' => 'form-control'],
                                            ) !!}
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="print[business_name]" value="1">
                                        <b>@lang('barcode.print_business_name')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[business_name_size]" value="10">
                                </div>
                            </td>

                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="print[packing_date]" value="1">
                                        <b>@lang('lang_v1.print_packing_date')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[packing_date_size]" value="10">
                                </div>
                            </td>

                            <td>
                                @php
                                    $custom_labels = json_decode(session('business.custom_labels'), true);
                                    $product_custom_field1 = !empty($custom_labels['product']['custom_field_1']) ? $custom_labels['product']['custom_field_1'] : __('lang_v1.product_custom_field1');
                                    $product_custom_field2 = !empty($custom_labels['product']['custom_field_2']) ? $custom_labels['product']['custom_field_2'] : __('lang_v1.product_custom_field2');
                                    $product_custom_field3 = !empty($custom_labels['product']['custom_field_3']) ? $custom_labels['product']['custom_field_3'] : __('lang_v1.product_custom_field3');
                                    $product_custom_field4 = !empty($custom_labels['product']['custom_field_4']) ? $custom_labels['product']['custom_field_4'] : __('lang_v1.product_custom_field4');
                                @endphp
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked name="print[product_custom_label]" value="1">
                                        <b>{{ $product_custom_field1 }}</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[product_custom_label_size]"
                                           value="10">
                                </div>
                            </td>


                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="print[show_vat]" value="1">
                                        <b>@lang('lang_v1.show_vat_text')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[show_vat_size]" value="10">
                                </div>
                            </td>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="print[custom_label_check]" value="1">
                                        <b>@lang('lang_v1.print_custom_lebel')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.label')</b></div>
                                    <input type="text" class="form-control" placeholder="Input Custom Label"
                                           name="print[custom_label]">
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[custom_label_size]"
                                           value="10">
                                </div>
                            </td>
                        </tr>
                        <td>
                            @if (request()->session()->get('business.enable_lot_number') == 1)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked name="print[lot_number]" value="1">
                                        <b>@lang('lang_v1.print_lot_number')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[lot_number_size]" value="10">
                                </div>
                            @endif
                        </td>

                        <td>
                            @if (request()->session()->get('business.enable_product_expiry') == 1)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked name="print[exp_date]" value="1">
                                        <b>@lang('lang_v1.print_exp_date')</b>
                                    </label>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon"><b>@lang('lang_v1.size')</b></div>
                                    <input type="text" class="form-control" name="print[exp_date_size]" value="10">
                                </div>
                            @endif
                        </td>
                        </tr>
                    </table>
                </div>

                <div class="col-sm-12">
                    <hr />
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('price_type', @trans('barcode.barcode_setting') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-cog"></i>
                            </span>
                            {!! Form::select('barcode_setting', $barcode_settings, !empty($default) ? $default->id : null, [
                                'class' => 'form-control barcode_settings',
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-sm-4 col-sm-offset-8">
                    <button type="button" id="labels_preview"
                            class="btn btn-primary pull-right btn-block">@lang('barcode.preview')</button>
                </div>
            </div>
        @endcomponent
        {!! Form::close() !!}

        <div class="col-sm-8 hide display_label_div">
            <h3 class="box-title">@lang('barcode.preview')</h3>
            <button type="button" class="col-sm-offset-2 btn btn-success btn-block" id="print_label">Print</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <!-- Preview section-->
    <div id="preview_box">
    </div>

@stop
@section('javascript')
    <script src="{{ asset('js/labels.js?v=' . $asset_v) }}"></script>

    <script>
        $(document).ready(function() {
            // Function to set input sizes based on selected barcode setting
            function setInputSizes() {
                // Get the selected value (id) from the dropdown
                var selected_id = $('.barcode_settings').val();

                // Determine maxsize based on selected_id
                var maxsize = (selected_id == 8) ? 5 : 10;

                // Update the input fields
                // $('input[name="print[business_name_size]"]').val(10);
                $('input[name="print[name_size]"]').val(maxsize);
                $('input[name="print[variations_size]"]').val(maxsize);
                $('input[name="print[price_size]"]').val(maxsize);
                $('input[name="print[packing_date_size]"]').val(maxsize);
                $('input[name="print[product_custom_label_size]"]').val(maxsize);
                $('input[name="print[show_vat_size]"]').val(maxsize);
                $('input[name="print[custom_label_size]"]').val(maxsize);
            }

            // Check on page load
            setInputSizes();

            // Listen for changes on the select field with class `barcode_settings`
            $(document).on('change', '.barcode_settings', function() {
                setInputSizes();
            });
        });




        $(document).on('click', '.remove_barcode_row', function() {
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(value => {
                if (value) {
                    $(this)
                        .closest('tr')
                        .remove();
                }
            });
        });
    </script>
@endsection
