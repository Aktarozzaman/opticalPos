@extends('layouts.auth3')

@section('content')

<div class="row">

    <h1 class="page-header text-center">Glorious POS Affiliate Registration</h2>
    
    <div class="col-md-8 col-md-offset-2">
        
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Register and Get Started in minutes</h3>
            </div>

            <form  method="POST" action="{{ route('affiliat.postRegister') }}">
                {{ csrf_field() }}

                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Owner Information -->
                   
                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('first_name','Name:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-info"></i>
                            </span>
                            {!! Form::text('first_name', null, ['class' => 'form-control','placeholder' => 'Name']); !!}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('contact_number','Mobile Number:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-info"></i>
                            </span>
                            {!! Form::text('contact_number', null, ['class' => 'form-control','placeholder' => 'Mobile Number']); !!}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('username','Username:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            {!! Form::text('username', null, ['class' => 'form-control','placeholder' => 'Username used for login']); !!}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('email','Email:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            {!! Form::text('email', null, ['class' => 'form-control','placeholder' => '']); !!}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('password','Password:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Login Password']); !!}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        {!! Form::label('confirm_password','Confirm Password:') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' => 'Same as Login Password']); !!}
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Register</button>
                </div>

            </form>
            
        </div>
          <!-- /.box -->
    </div>

</div>

@endsection