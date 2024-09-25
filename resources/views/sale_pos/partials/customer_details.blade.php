@php
    if(isset($sell->remarks)) {
        $category = \App\Category::find($sell->remarks);
        $remarks = $category ? $category->name : null;
    } else {
        $remarks = null;
    }
@endphp
<table class="table bg-gray table-bordered table-responsive">
        <tr class="bg-green">
        <th>{{ $custom_labels['contact']['custom_field_1']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_2']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_3']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_4']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_5']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_6']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_7']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_8']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_9']}}</th>
        <th>{{ $custom_labels['contact']['custom_field_10']}}</th>
        <th> @lang('lang_v1.lens_type')</th>
        <th>@lang('lang_v1.remarks')</th>

    </tr>

        <tr>
            <td>{{ $sell->custom_field_1 }}</td>
            <td>{{ $sell->custom_field_2 }}</td>
            <td>{{ $sell->custom_field_3 }}</td>
            <td>{{ $sell->custom_field_4 }}</td>
            <td>{{ $sell->custom_field_5 }}</td>
            <td>{{ $sell->custom_field_6 }}</td>
            <td>{{ $sell->custom_field_7 }}</td>
            <td>{{ $sell->custom_field_8 }}</td>
            <td>{{ $sell->custom_field_9 }}</td>
            <td>{{ $sell->custom_field_10 }}</td>
            <td>{{ $sell->lens_type }}</td>
            <td>{{ $remarks }}</td>

        </tr>


</table>