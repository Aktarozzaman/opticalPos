<div id="variant_value_id_{{$update_variant_id}}" class="variant_value_list" key="{{$update_variant_id}}">
    <label for="">{{$variation_templates->name}}</label>
    <select name="cars" id="variant_{{$update_variant_id}}" class="form-control basic_multiple" multiple="multiple" onchange="update_product_variant_list()">
        @foreach($variation_templates_value as $value)
        <option value="{{$value->name}}">{{$value->name}}</option>
        @endforeach
    </select>
</div>