@extends('layouts.app')
@section('title', __('superadmin::lang.all_coupon'))
<style>
    .badge-primary {
        background-color: rgb(0, 255, 94) !important;
        color: white !important;
    }

    .badge-secondary {
        background-color: rgb(234, 19, 19) !important;
        color: white !important;
    }
</style>
@section('content')
@include('superadmin::layouts.nav')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('superadmin::lang.all_coupon')
            <small>@lang('superadmin::lang.menage_all_coupon')</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">&nbsp;</h3>
                <div class="box-tools">
                    <a href="{{action('\Modules\Superadmin\Http\Controllers\CouponController@index')}}"
                        class="btn btn-block btn-primary">
                        <i class="fa fa-plus"></i> @lang( 'messages.add' )</a>
                </div>
            </div>

            <div class="box-body">
                @can('trial_users.view')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="superadmin_business_table">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('superadmin::lang.coupon_code')
                                    </th>
                                    
                                    <th>@lang('superadmin::lang.discount_type')</th>
                                    <th>@lang('superadmin::lang.discount_amount')</th>
                                    <th>@lang('superadmin::lang.activation_date')</th>
                                    <th>@lang('superadmin::lang.expire_date')</th>
                                    <th>@lang('superadmin::lang.t_n_of_users')</th>
                                    <th>@lang('superadmin::lang.n_of_uses_per_user')</th>
                                    <th>@lang('superadmin::lang.description')</th>
                                    <th>@lang('superadmin::lang.status')</th>
                                    

                                </tr>
                            </thead>
                        </table>
                    </div>
                @endcan
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            superadmin_business_table = $('#superadmin_business_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ action('\App\Http\Controllers\ManageUserController@trialuser') }}",
                    data: function(d) {},
                },
                aaSorting: [
                    [0, 'desc']
                ],
                columns: [

                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'business_id',
                        name: 'business_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'owner_name',
                        name: 'owner_name',
                        searchable: false
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'contact_no',
                        name: 'contact_no'
                    },
                    {
                        data: 'business_contact_number',
                        name: 'business_contact_number'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                        searchable: false
                    }

                ],

                'columnDefs': [{
                        "orderable": false,
                        'targets': [0]
                    },
                    {
                        'render': function(data, type, row) {
                            var is_active = row.is_active;
                            console.log('is_active:', is_active); // Check the value
                            if (is_active == '1') {
                                data = '<span class="badge badge-primary">Active</span>';
                            } else {
                                data = '<span class="badge badge-secondary">Inactive</span>';
                            }
                            return data;
                        },
                        'targets': 8
                    },

                ],


            });

            $('#package_id, #subscription_status, #is_active, #last_transaction_date, #no_transaction_since')
                .change(function() {
                    superadmin_business_table.ajax.reload();
                });
        });
    </script>

@endsection
