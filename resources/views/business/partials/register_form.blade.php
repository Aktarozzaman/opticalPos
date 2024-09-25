
{{-- @if (empty($is_admin)) --}}
    <h3 class="business_text">&#10065; Register your business grow your business</h3>
{{-- @endif --}}
{!! Form::hidden('language', request()->lang) !!}

<fieldset
    style="background:#fff; color: #000; padding: 30px 20px; border-radius: 10px; margin: 30px 0; box-shadow: 0 0 10px 5px #0000001f;">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name', __('business.business_name') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-suitcase"></i>
                </span>
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Organization Name',
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('first_name', __('business.first_name') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('first_name', null, [
                    'class' => 'form-control',
                    'placeholder' => __('business.first_name'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nid', __('business.nid') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('nid', null, [
                    'class' => 'form-control',
                    'placeholder' => __('business.nid'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('mobile', __('lang_v1.business_telephone') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::number('mobile', null, ['class' => 'form-control','placeholder' => __('lang_v1.business_telephone'), 'required']) !!} 
            </div>
            <div class="clearfix"></div>
                @if ($errors->has('mobile'))
                    <span class="form-text">
                        <strong
                            class="text-danger form-control-sm">{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('alternate_number', __('business.alternate_number') . '') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::number('alternate_number', null, [
                    'class' => 'form-control',
                    'placeholder' => __('business.alternate_number'),
                ]) !!}
            </div>
            <div class="clearfix"></div>
                @if ($errors->has('alternate_number'))
                    <span class="form-text">
                        <strong
                            class="text-danger form-control-sm">{{ $errors->first('alternate_number') }}</strong>
                    </span>
                @endif
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('address_line_1', __('business.address_line_1') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('address_line_1', null, [
                    'class' => 'form-control',
                    'placeholder' => 'House#2, Banani',
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('address_line_2', __('business.address_line_2') . '') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('address_line_2', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Gulshan, Dhaka',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('start_date', __('business.start_date') . '') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                {!! Form::text('start_date', null, [
                    'class' => 'form-control start-date-picker',
                    'placeholder' => __('business.start_date'),
                    'readonly',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('website', __('lang_v1.website') . '') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.website')]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('business_logo', __('business.upload_logo') . '') !!}
            {!! Form::file('business_logo', ['accept' => 'image/*']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('business_license', 'Upload Business Certificate/Trade license/National ID Card' . '*') !!}
            {!! Form::file('business_license', ['accept' => 'image/*']) !!}
        </div>
    </div>
</fieldset>

<h3 style="font-weight: bold; color: #fff; font-size: 16px">&#10065; Software Login Information</h3>
<fieldset
    style="background: #ffffff; color: rgb(0, 0, 0); padding: 30px 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 10px 5px #0000001f;">
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('username', __('business.username') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                {!! Form::text('username', null, [
                    'class' => 'form-control',
                    'placeholder' => __('business.username'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', __('business.email') . '') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('business.email')]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password', __('business.password') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                {!! Form::password('password', [
                    'class' => 'form-control',
                    'placeholder' => __('business.password'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('confirm_password', __('business.confirm_password') . '*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                {!! Form::password('confirm_password', [
                    'class' => 'form-control',
                    'placeholder' => __('business.confirm_password'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        @if (!empty($system_settings['superadmin_enable_register_tc']))
            <div class="form-group">
                <label>
                    {!! Form::checkbox('accept_tc', 0, false, ['required', 'class' => 'input-icheck']) !!}
                    <u><a class="terms_condition cursor-pointer" data-toggle="modal" data-target="#tc_modal">
                            @lang('lang_v1.accept_terms_and_conditions') <i></i>
                        </a></u>
                </label>
            </div>
            @include('business.partials.terms_conditions')
        @endif
    </div>
</fieldset>

<div class="clearfix text-center">
    <button type="submit" class="btn btn-info" > REGISTER </button>
</div>



