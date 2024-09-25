@if (!session('business.enable_price_tax'))
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
    $array_name = 'product_variation_edit';
    $variation_array_name = 'variations_edit';
@endphp


<tr class="variation_row">
    <td>
        <table class="table table-condensed table-bordered blue-header variation_value_table">
            <thead>
                <tr>
                    <th>@lang('product.sku') @show_tooltip(__('tooltip.sub_sku'))</th>
                    <th>@lang('product.value')</th>
                    <th>@lang('product.default_purchase_price')
                        <br />
                        <span class="pull-left"><small><i>@lang('product.exc_of_tax')</i></small></span>

                        <span class="pull-right"><small><i>@lang('product.inc_of_tax')</i></small></span>
                    </th>
                    <th>@lang('product.profit_percent')</th>
                    <th>@lang('product.default_selling_price')
                        <br />
                        <small><i><span class="dsp_label"></span></i></small>
                    </th>
                    <th>@lang('lang_v1.variation_images')</th>
                    <th>
                        <button type="button" class="btn btn-success btn-xs add_variation_value_row">+</button>
                    </th>
                </tr>
            </thead>

            <tbody>
                @if ($product->type == 'variable')
                    @foreach ($combinations as $key => $variation)
                        @php
                            $variation_row_index = $loop->index;
                            $sub_sku_required = 'required';
                            $row_index = $loop->index;
                        @endphp
                        <tr key="{{ $variation_row_index }}">
                            <input type="hidden" id="product_id"
                                name="product_variation_edit[{{ $row_index }}][variations][0][id]"
                                value="{{ $variation->id }}">

                            <td>
                                {!! Form::text('  product_variation_edit[' . $row_index . '][variations][0][sub_sku]', $variation->sub_sku, [
                                    'class' => 'form-control input-sm',
                                ]) !!}
                            </td>
                            <td>
                                {!! Form::text('  product_variation_edit[' . $row_index . '][variations][0][value]', $variation->name, [
                                    'class' => 'form-control input-sm variation_value_name',
                                    'required',
                                ]) !!}
                            </td>
                            <td>
                                <div class="width-50 f-left">
                                    {!! Form::text(
                                        '  product_variation_edit[' . $row_index . '][variations][0][default_purchase_price]',
                                        $variation->default_purchase_price,
                                        [
                                            'class' => 'form-control input-sm variable_dpp input_number',
                                            'placeholder' => __('product.exc_of_tax'),
                                            'required',
                                        ],
                                    ) !!}
                                </div>

                                <div class="width-50 f-left">
                                    <div class="input-group">
                                        {!! Form::text(
                                            '  product_variation_edit[' . $row_index . '][variations][0][dpp_inc_tax]',
                                            $variation->default_purchase_price,
                                            [
                                                'class' => 'form-control input-sm variable_dpp_inc_tax input_number',
                                                'placeholder' => __('product.inc_of_tax'),
                                                'required',
                                            ],
                                        ) !!}
                                        <span class="input-group-btn">
                                            <button type="button"
                                                class="btn btn-default bg-white apply-all btn-sm p-5-5"
                                                data-toggle="tooltip" title="@lang('lang_v1.apply_all')"
                                                data-target-class=".variable_dpp_inc_tax"><i
                                                    class="fas fa-check-double"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    {!! Form::text(
                                        '  product_variation_edit[' . $row_index . '][variations][0][profit_percent]',
                                        $variation->profit_percent,
                                        ['class' => 'form-control input-sm variable_profit_percent input_number', 'required'],
                                    ) !!}

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default bg-white apply-all btn-sm p-5-5"
                                            data-toggle="tooltip" title="@lang('lang_v1.apply_all')"
                                            data-target-class=".variable_profit_percent"><i
                                                class="fas fa-check-double"></i></button>
                                    </span>
                                </div>
                            </td>
                            <td>
                                {!! Form::text(
                                    '  product_variation_edit[' . $row_index . '][variations][0][default_sell_price]',
                                    $variation->default_sell_price,
                                    [
                                        'class' => 'form-control input-sm variable_dsp input_number',
                                        'placeholder' => __('product.exc_of_tax'),
                                        'required',
                                    ],
                                ) !!}

                                {!! Form::text(
                                    '  product_variation_edit[' . $row_index . '][variations][0][sell_price_inc_tax]',
                                    $variation->sell_price_inc_tax,
                                    [
                                        'class' => 'form-control input-sm variable_dsp_inc_tax input_number',
                                        'placeholder' => __('product.inc_of_tax'),
                                        'required',
                                    ],
                                ) !!}
                            </td>
                            <td>
                                @php
                                    $action = !empty($action) ? $action : '';
                                @endphp
                                @if ($action !== 'duplicate')
                                    @foreach ($variation->media as $media)
                                        <div class="img-thumbnail">
                                            <span class="badge bg-red delete-media"
                                                data-href="{{ action('ProductController@deleteMedia', ['media_id' => $media->id]) }}"><i
                                                    class="fa fa-close"></i></span>
                                            {!! $media->thumbnail() !!}
                                        </div>
                                    @endforeach
                                @endif
                                <div class="form-group">
                                    {!! Form::file('variation_images_' . $row_index . '_0[]', [
                                        'class' => 'variation_images',
                                        'accept' => 'image/*',
                                        'multiple',
                                    ]) !!}
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-
                                </button>
                                <input type="hidden" class="variation_row_index" value="{{ $loop->index }}">
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </td>
</tr>
