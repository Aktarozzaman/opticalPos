@extends('layouts.app')
@section('title', 'Message History');
@section('content')
    <section class="content-header">
        <h1>{{ __('Message History') }} </h1>
    </section>
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box mt-3">
                        <h4 class="mb-2">Message History</h4>
                        <form action="">
                            <div class="d-flex justify-content-end row" style="gap: 16px">
                                <div class="col-md-3">
                                    <input class="form-control datepicker startdate" value="" type="text"
                                        placeholder="Start Date" name="start" data-date-format="mm-dd-yyyy"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control datepicker enddate" value="" type="text"
                                        placeholder="End Date" name="end" data-date-format="mm-dd-yyyy" autocomplete="off">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" style="cursor: pointer;"
                                        class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Date</th>
                                            <th>Mobile Number</th>
                                            <th>Message</th>
                                            <th>SMS Type</th>
                                            <th>Word Count</th>
                                            {{-- <th>Response</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($smsHistoryList as $smsHistoryInfo)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $smsHistoryInfo->created_at->format('d F Y \T\i\m\e: g:i A') }}
                                                </td>
                                                <td>


                                                    @foreach (json_decode($smsHistoryInfo->mobile_number) as $mobileNumber)
                                                        {{ $mobileNumber }} <br>
                                                    @endforeach


                                                </td>
                                                <td>{{ $smsHistoryInfo->message }}</td>
                                                <td>{{ $smsHistoryInfo->sms_type }}</td>
                                                <td>{{ $smsHistoryInfo->sms_count }}</td>
                                                {{-- <td>{{ $smsHistoryInfo->response }}</td> --}}

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                                <div class="d-flex justify-content-end">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcomponent
    </section>
@endsection
@push('js')
@endpush
