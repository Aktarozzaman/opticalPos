@if(!session('business.enable_price_tax'))
    @php
        $default = 0;
        $class = 'hide';
    @endphp
@else
    @php
        $default = null;
        $class = '';
    @endphp
@endif

@php
    $array_name = 'product_variation';
    $variation_array_name = 'variations';
    if($action == 'duplicate'){
       $array_name = 'product_variation';
       $variation_array_name = 'variations';
    }
@endphp

<div class="variation_row" style="width: 100%">
{{--    <td>--}}
{{--        {!! Form::text($array_name . '[' . $row_index .'][name]', $product_variation->name,--}}
{{--        ['class' => 'form-control input-sm variation_name', 'required', 'readonly']); !!}--}}

{{--        {!! Form::hidden($array_name . '[' . $row_index .'][variation_template_id]', $product_variation->variation_template_id); !!}--}}

{{--        <input type="hidden" class="row_index" value="@if($action == 'edit'){{$row_index}}@else{{$loop->index}}@endif">--}}
{{--        <input type="hidden" class="row_edit" value="edit">--}}
{{--    </td>--}}

    <div>
        <table class="table table-condensed table-bordered blue-header variation_value_table" id="variation_value_table">
            <thead >
            <tr style="width: 100%">
                <th>@lang('product.sku') @show_tooltip(__('tooltip.sub_sku'))</th>
                <th>@lang('product.value')</th>
                <th class="{{$class}}">@lang('product.default_purchase_price')
                    <br/>
                    <span class="pull-left"><small><i>@lang('product.exc_of_tax')</i></small></span>

                    <span class="pull-right"><small><i>@lang('product.inc_of_tax')</i></small></span>
                </th>
                <th class="{{$class}}">@lang('product.profit_percent')</th>
                <th class="{{$class}}">@lang('product.default_selling_price')
                    <br/>
                    <small><i><span class="dsp_label"></span></i></small>
                </th>
                <th>@lang('lang_v1.variation_images')</th>
                <th><button type="button" class="btn btn-success btn-xs add_variation_value_row">+</button></th>
            </tr>
            </thead>

            <tbody>

            @foreach($combinations as $key=>$variation)
                @php
                    $variation_row_index = $loop->index;
                    $sub_sku_required = 'required';
                    $row_index = $loop->index;
                    if($action == 'duplicate'){
                        $variation_row_index = $loop->index;
                        $sub_sku_required = '';
                    }
                @endphp
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][sub_sku]', $action == 'add' ? $variation : $variation, ['class' => 'form-control input-sm variation_value_name', $sub_sku_required]); !!}--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][value]', $variation, ['class' => 'form-control input-sm variation_value_name', 'required', 'readonly']); !!}--}}

{{--                        {!! Form::hidden($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][variation_value_id]', 0); !!}--}}
{{--                    </td>--}}
{{--                    <td class="{{$class}}">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][default_purchase_price]', @num_format(0), ['class' => 'form-control input-sm variable_dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); !!}--}}
{{--                        </div>--}}

{{--                        <div class="col-sm-6">--}}
{{--                            {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][dpp_inc_tax]', @num_format(0), ['class' => 'form-control input-sm variable_dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); !!}--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                    <td class="{{$class}}">--}}
{{--                        {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][profit_percent]', @num_format(0), ['class' => 'form-control input-sm variable_profit_percent input_number', 'required']); !!}--}}
{{--                    </td>--}}
{{--                    <td class="{{$class}}">--}}
{{--                        {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][default_sell_price]', @num_format(0), ['class' => 'form-control input-sm variable_dsp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); !!}--}}

{{--                        {!! Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][sell_price_inc_tax]', @num_format(0), ['class' => 'form-control input-sm variable_dsp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); !!}--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        @php--}}
{{--                            $action = !empty($action) ? $action : '';--}}
{{--                        @endphp--}}

{{--                            {!! Form::file('edit_variation_images_' . $row_index . '_' . $variation_row_index . '[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']); !!}--}}

{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>--}}
{{--                        <input type="hidden" class="variation_row_index" value="@if($action == 'duplicate'){{$loop->index}}@else{{0}}@endif">--}}
{{--                    </td>--}}
{{--                </tr>--}}
                &nbsp;  <tr key="{{$variation_row_index}}">
                    <td>
                        {!! Form::text('product_variation[' . $row_index .'][variations][0][sub_sku]', null, ['class' => 'form-control input-sm']); !!}
                    </td>
                    <td>
                        {!! Form::text('product_variation[' . $row_index .'][variations][0][value]', $variation, ['class' => 'form-control input-sm variation_value_name', 'required']); !!}
                    </td>
                    <td class="{{$class}}">
                        <div class="width-50 f-left">
                            {!! Form::text('product_variation[' . $row_index .'][variations][0][default_purchase_price]', $default, ['class' => 'form-control input-sm variable_dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); !!}
                        </div>

                        <div class="width-50 f-left">
                            <div class="input-group">
                                {!! Form::text('product_variation[' . $row_index .'][variations][0][dpp_inc_tax]', $default, ['class' => 'form-control input-sm variable_dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); !!}
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-default bg-white apply-all btn-sm p-5-5" data-toggle="tooltip" title="@lang('lang_v1.apply_all')" data-target-class=".variable_dpp_inc_tax"><i class="fas fa-check-double"></i></button>
                            </span>
                            </div>
                        </div>
                    </td>
                    <td class="{{$class}}">
                        <div class="input-group">
                            {!! Form::text('product_variation[' . $row_index .'][variations][0][profit_percent]', $profit_percent, ['class' => 'form-control input-sm variable_profit_percent input_number', 'required']); !!}

                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default bg-white apply-all btn-sm p-5-5" data-toggle="tooltip" title="@lang('lang_v1.apply_all')" data-target-class=".variable_profit_percent"><i class="fas fa-check-double"></i></button>
                        </span>
                        </div>
                    </td>
                    <td class="{{$class}}">
                        <div class="exc_of_tax">
                            {!! Form::text('product_variation[' . $row_index .'][variations][0][default_sell_price]', $default, ['class' => 'form-control input-sm variable_dsp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); !!}

                        </div>
                        <div class="inc_of_tax" style="display: none">
                            {!! Form::text('product_variation[' . $row_index .'][variations][0][sell_price_inc_tax]', $default, ['class' => 'form-control input-sm variable_dsp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); !!}

                        </div>

                    </td>
                    <td>{!! Form::file('variation_images_' . $row_index .'_0[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']); !!}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>
                        <input type="hidden" class="variation_row_index" value="0">
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>