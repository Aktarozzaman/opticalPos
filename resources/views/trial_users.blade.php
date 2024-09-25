@extends('layouts.app')
@section('title', __('superadmin::lang.all_trial_business'))
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

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('superadmin::lang.all_trial_business')
            <small>@lang('superadmin::lang.all_trial_manage_business')</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-solid">

            <div class="box-body">
                @can('trial_users.view')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="superadmin_business_table">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('superadmin::lang.registered_on')
                                    </th>
                                    <th>Business ID</th>
                                    <th>@lang('superadmin::lang.business_name')</th>
                                    <th>@lang('business.owner')</th>
                                    <th>@lang('business.email')</th>
                                    <th>@lang('superadmin::lang.owner_number')</th>
                                    <th>@lang('superadmin::lang.business_contact_number')</th>
                                    <th>@lang('business.address')</th>
                                    <th>@lang('sale.status')</th>

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
