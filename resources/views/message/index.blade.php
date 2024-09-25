@extends('layouts.app')
@section('title', 'Message Setting');
@section('content')

<style>
     .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .col-xs-12,
        .col-sm-6,
        .col-md-6,
        .col-lg-4 {
            padding-left: 15px;
            padding-right: 15px;
        }

        .small-box {
            background-color: #f0f0f0;
            border-radius: 4px;
            padding: 10px;
            position: relative;
            margin-bottom: 15px;
        }

        .whitecolor {
            color: #fff;
        }

        .inner {
            text-align: center;
        }

        .inner h4 {
            font-size: 24px;
            margin: 0;
        }

        .inner p {
            font-size: 14px;
            margin: 0;
        }

        .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            bottom: 10px;
            left: 10px;
            font-size: 40px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-darkgreen {
            background-color: #17a2b8;
        }

        .bg-success {
            background-color: #28a745;
        }




</style>
    <section class="content-header">
        <h1>{{ __('Message Setting') }} </h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <!-- Start content -->
                <div class="col-md-12">
                    <div class="card-box table-responsive mt-3">
                        <h4 class="mb-3">Message Setting</h4>

                        <div class="row my-3">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="small-box bg-primary whitecolor mt-3">
                                    <div class="inner">
                                        <h4><span class="count-number">{{ $sumSmsCount ?? 0 }}</span> </h4>
                                        <p>Total Purchase SMS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sms"></i>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="small-box bg-darkgreen whitecolor mt-3">
                                    <div class="inner">
                                        <h4><span class="count-number">{{ ($sumSmsCount ?? 0) - ($business->sms_amount ?? 0) }}</span> </h4>
                                        <p>Total Used SMS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sms"></i>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="small-box bg-success whitecolor mt-3">
                                    <div class="inner">
                                        <h4><span class="count-number">{{ $business->sms_amount ?? 0 }}</span></h4>
                                        <p>Total Available SMS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sms"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('save-settings') }}" method="POST">
                                    @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Sale</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_sale" name="enable_sale"
                                                    onchange="updateSetting('enable_sale')" data-plugin="switchery" data-color="#00b19d"
                                                    @if($settings && $settings->enable_sale) checked @endif />
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Purchases</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_sale_return" name="enable_sale_return"
                                                    onchange="updateSetting('enable_sale_return')" data-plugin="switchery" data-color="#00b19d"
                                                    @if($settings && $settings->enable_sale_return) checked @endif />
                                            </div>
                                        </th>
                                    </tr>



                                    <tr>
                                        <th>Sale Replace</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_sale_replace" name="enable_sale_replace"
                                                onchange="updateSetting('enable_sale_replace')" data-plugin="switchery" data-color="#00b19d"
                                                @if($settings && $settings->enable_sale_replace) checked @endif />
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Due Receive</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_due_receive" name="enable_due_receive"
                                                onchange="updateSetting('enable_due_receive')" data-plugin="switchery" data-color="#00b19d"
                                                @if($settings && $settings->enable_due_receive) checked @endif />
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Due Payment</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_due_payment" name="enable_due_payment"
                                                onchange="updateSetting('enable_due_payment')" data-plugin="switchery" data-color="#00b19d"
                                                @if($settings && $settings->enable_due_payment) checked @endif />
                                            </div>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>Installment</th>
                                        <th>
                                            <div class="switchery-demo">
                                                <input type="checkbox" value="1" id="enable_installment" name="enable_installment"
                                                onchange="updateSetting('enable_installment')" data-plugin="switchery" data-color="#00b19d"
                                                @if($settings && $settings->enable_installment) checked @endif />
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-success">Save Settings</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcomponent
    </section>
@endsection
@push('js')

<script>
    function updateSetting(settingName) {
      // Retrieve the checkbox element
      var checkbox = document.getElementById(settingName);
    
      // Retrieve the checked state of the checkbox
      var isChecked = checkbox.checked;
    
      // Perform an AJAX request to update the setting on the server
      // You can use a library like Axios or jQuery.ajax to simplify this process
      // Example using Axios:
      axios.post('/update-setting', { settingName: settingName, isChecked: isChecked })
        .then(function(response) {
          // Handle the response from the server if needed
          console.log(response.data);
        })
        .catch(function(error) {
          // Handle any errors that occurred during the request
          console.error(error);
        });
    }
    </script>
    
@endpush
