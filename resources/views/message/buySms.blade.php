@extends('layouts.app')
@section('title', 'SMS Pricing');
@section('content')
    <section class="content-header">
        <h1>{{ __('SMS Pricing') }} </h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">

                <style>
                    .card-box {
                        background: #c9e5e5;
                        padding: 15px;
                    }

                    .card-header {
                        background-color: #f8f9fa;
                        border-bottom: 1px solid #dee2e6;
                        padding: 10px;
                    }

                    .card-body {
                        background-color: #f8f9fa;
                        padding: 10px;
                    }

                    .payment-featurs {
                        padding: 10px;
                        line-height: 30px;
                        font-size: 18px;
                    }

                    .payment-featurs li {
                        margin-bottom: 10px;
                    }

                    .payment-featurs li i {
                        margin-right: 10px;
                    }

                    .text-success {
                        color: green;
                    }

                    .text-muted {
                        color: gray;
                    }

                    .text-uppercase {
                        text-transform: uppercase;
                    }

                    .pay-btn {
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        text-decoration: none;
                        text-align: center;
                        display: block;
                        width: 100%;
                        padding: 10px;
                        margin-top: 20px;
                    }

                    .pay-btn:hover {
                        background-color: #0056b3;
                    }
                </style>


                <div class="col-md-5">
                    <div class="card-box table-responsive mt-4">
                        <div class="card mb-5 mb-lg-0 rounded-lg shadow payment-card">
                            <div class="card-header">
                                <h4 class="h1 text-right">SMS Package</h4>
                            </div>
                            <div class="card-body bg-light rounded-bottom p-0">
                                <ul class="list-unstyled p-3 mb-0 payment-featurs">
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>Minimum Quantity: 500 SMS
                                    </li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>500-2000 per SMS: 0.30 BDT
                                    </li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>2001-5000 per SMS: 0.25 BDT
                                    </li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>5001-Unlimited per SMS:
                                        0.20 BDT</li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>Message History</li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>Message Report</li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>Group Messaging</li>
                                    <li class="mb-3"><i class="fas fa-check text-success mr-3"></i>No Expiry Issue</li>
                                    <li class="text-muted mb-3"><i class="fas fa-times mr-3"></i>Free SMS</li>
                                    <li class="text-muted mb-3"><i class="fas fa-times mr-3"></i>Monthly Payment</li>
                                </ul>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#purchaseModal"
                                    class="btn btn-block text-uppercase rounded-lg pay-btn py-3">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">

                    <div class="card-box table-responsive mt-4">
                        {{-- <div class="row">
                            <div class="col-6 text-left">

                            </div>
                            <div class="col-6 text-right">
                                <span style="font-size: 18px; font-weight: bold;">SMS Available Quantity: </span>
                                <span style="color: red; font-size: 18px; font-weight: bold;">0</span>
                            </div>
                        </div> --}}

                        <h4 class="mb-3">Purchase History</h4>

                        <table class="table table-bordered table-responsive mt-4" id="data-table">
                            <thead class="theme-primary text-white">
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>SMS Quantity</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalQuantity = 0;
                                $totalAmount = 0;
                                ?>
                                @foreach ($buySMSListings as $buySMSInfo)
                                    <?php
                                    $totalQuantity += $buySMSInfo->sms_count;
                                    $totalAmount += $buySMSInfo->amount;
                                    ?>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $buySMSInfo->created_at->format('d F Y') }}</td>
                                        <td>{{ $buySMSInfo->sms_count }}</td>
                                        <td>{{ $buySMSInfo->amount }}</td>
                                        <td>{{ $buySMSInfo->status }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total:</strong></td>
                                    <td><strong>{{ $totalQuantity }}</strong></td>
                                    <td><strong>{{ $totalAmount }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 10px !important">
                        <div class="card">
                            <div class="card-header">
                                <h3>Purchase SMS</h3>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('message.pay') }}" method="POST">
                                    @csrf
                                    <div class="p-3">
                                        <div class="form-group">
                                            <label for="quantity">Purchase Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control"
                                                min="500" required>
                                        </div>
                                        <input type="hidden" name="amount" id="final_amount">
                                    </div>
                                    <div class="d-flex justify-content-between modal-action-btns">
                                        <button type="button" class="btn btn-xl btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" id="pay_btn" class="btn btn-xl btn-primary">Pay <b><span
                                                    id="amount">0</span> TK</b></button>
                                    </div>
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
        // Get the quantity input field and the amount span
        var quantityInput = document.getElementById('quantity');
        var amountSpan = document.getElementById('amount');
        var finalAmountInput = document.getElementById('final_amount');

        // Add an event listener to the quantity input field
        quantityInput.addEventListener('input', function() {
            // Get the quantity value
            var quantity = this.value;

            // Define the pricing tiers
            var pricingTiers = [{
                    min: 500,
                    max: 2000,
                    price: 0.30
                },
                {
                    min: 2001,
                    max: 5000,
                    price: 0.25
                },
                {
                    min: 5001,
                    max: Infinity,
                    price: 0.20
                }
            ];

            // Initialize the amount variable
            var amount = 0;

            // Loop through the pricing tiers and find the corresponding price for the quantity
            for (var i = 0; i < pricingTiers.length; i++) {
                var tier = pricingTiers[i];
                if (quantity >= tier.min && quantity <= tier.max) {
                    amount = Math.round(quantity * tier.price); // Round the amount to the nearest integer
                    break;
                }
            }

            // Update the amount span with the calculated amount
            amountSpan.textContent = amount; // Display the amount as an integer

            // Update the final amount input value
            finalAmountInput.value = amount;
        });
    </script>
@endpush
