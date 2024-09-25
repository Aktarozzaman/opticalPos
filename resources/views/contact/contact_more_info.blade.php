@php
    $custom_labels = json_decode(session('business.custom_labels'), true);
@endphp

@if(!empty($contact->custom_field1))
    <div class="col-md-3">
        <strong>{{ $custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1') }}</strong>
        <p class="text-muted">
            {{ $contact->custom_field1 }}
        </p>
    </div>
@endif

@if(!empty($contact->custom_field2))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2') }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field2 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field3))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3') }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field3 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field4))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4') }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field4 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field5))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field5 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field6))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_6'] ?? __('lang_v1.custom_field', ['number' => 6]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field6 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field7))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_7'] ?? __('lang_v1.custom_field', ['number' => 7]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field7 }}
    </p>
    </div>
@endif
@if(!empty($contact->custom_field8))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_8'] ?? __('lang_v1.custom_field', ['number' => 8]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field8 }}
    </p>
    </div>
@endif
@if(!empty($contact->custom_field9))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_9'] ?? __('lang_v1.custom_field', ['number' => 9]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field9 }}
    </p>
    </div>
@endif

@if(!empty($contact->custom_field10))
    <div class="col-md-3">
    <strong>{{ $custom_labels['contact']['custom_field_10'] ?? __('lang_v1.custom_field', ['number' => 10]) }}</strong>
    <p class="text-muted">
        {{ $contact->custom_field10 }}
    </p>
    </div>
@endif
@if(!empty($contact->lens_type))
    <div class="col-md-3">
        <strong>@lang('lang_v1.lens_type')</strong>
        <p class="text-muted">
            {{ $contact->lens_type }}
        </p>
    </div>
@endif
@if(!empty($contact->remarks))
    <div class="col-md-3">
        <strong>@lang('lang_v1.remarks')</strong>
        <p class="text-muted">
            {{ $contact->remarkName($contact->remarks) }}
        </p>
    </div>
@endif