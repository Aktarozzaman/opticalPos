<div class="col-md-12">
    <form
        action="{{ action([\Modules\Superadmin\Http\Controllers\SubscriptionController::class, 'confirm'], [$package->id]) }}"
        method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="gateway" value="{{ $k }}">


        @php
            $price = 0;
            
            if (auth()->user()->sub_status == 0) {
                if ($package->id == 2) {
                    $price += 4999;
                } elseif ($package->id == 3) {
                    $price += 4999;
                } elseif ($package->id == 4) {
                    $price += 4999;
                } elseif ($package->id == 5) {
                    $price += 14999;
                } else {
                    $price = 0;
                }
            }
        @endphp


        @php
            
            $active_package = \Modules\Superadmin\Entities\Subscription::active_subscription(auth()->user()->business_id);
            
            if ($active_package !== null) {
                $active_package = $active_package->where('subscription_status', 1)->first();
            }
            
            $newSetupFee = 0;
            $runningPackagePrice = 0;
            
            if ($active_package === null) {
                $newSetupFee = 0;
                $runningPackagePrice = 0;
            } else {
                if ($active_package->package_id == $package->id) {
                    // echo 'Running';
                } else {
                    if ($package->id == 2) {
                        $newSetupFee = 4999;
                    } elseif ($package->id == 3) {
                        $newSetupFee = 4999;
                    } elseif ($package->id == 4) {
                        $newSetupFee = 4999;
                    } elseif ($package->id == 5) {
                        $newSetupFee = 14999;
                    } else {
                        $newSetupFee = 0;
                    }
                }
            
                $runningPackagePrice = 4999;
            }
        @endphp


        <input type="hidden" value="{{ $runningPackagePrice ?? 0 }}">

        <input type="hidden" value="{{ $newSetupFee ?? 0 }}">

        <input type="hidden" id="calculated_package_price" value="{{ $price ?? 0 }}">

        <input type="hidden" id="month_count_value" name="month_count" value="1">

        <input type="hidden" id="total_payable_amount" name="total_package_price">

        {{-- <button type="submit" class="btn btn-success"> <i class="fas fa-handshake"></i> {{ $v }}</button> --}}

        <a style="background-color: #d63384;" id="bkash_payment_button" href="#" class="btn btn-info">Pay with
            bkash</a>
    </form>
    <p class="help-block">@lang('superadmin::lang.offline_pay_helptext')</p>
    <p class="help-block">{!! nl2br($offline_payment_details) ?? '' !!}</p>

</div>

@push('js')
    <script>
        function changeURL() {
            var package_name = "{{ $package->name }}";
            var package_id = "{{ $package->id }}";
            var user_name = "{{ $userName }}";
            var user_id = "{{ $userId }}";

            var price = $('#total_payable').val();
            var calculated_package_price = $('#calculated_package_price').val();

            $('#total_payable_amount').val(price);
            var month_count = $('#month_count').val();

            var runningPackagePrice = "{{ $runningPackagePrice }}";
            var newSetupFee = "{{ $newSetupFee }}";
            var newPackagePrice = +newSetupFee + +$('#total_payable_amount').val();

            if (newSetupFee == 0) {
                price = +price + +calculated_package_price;
            } else {
                var price = newPackagePrice - runningPackagePrice;
            }

            // console.log(newSetupFee);

            $('#bkash_payment_button').attr('href', 'https://bkash.sumondutta.com/bkash/payment?packageId=' + package_id +
                '&packageName=' + package_name + '&price=' + price + '&userName=' + user_name + '&id=' + user_id + '&monthCount=' + month_count +
                '&from=pos');
        }
    </script>
@endpush
