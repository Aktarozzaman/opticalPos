@extends('layouts.auth4')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    .achivements_wrapper {
        background-color: #8c9baf;
        padding: 20px;
        color: #fff;
    }
</style>

<style>
    #social-links {
        display: inline-table;
        margin: 10px -42px;
    }

    #social-links ul li {
        display: inline;

    }

    #social-links ul li a {
        padding: 9px;
        border: 1px solid #ccc;
        margin: 1px;
        font-size: 20px;
        margin: 2px;
    }

    table.dataTable {
        border-collapse: separate !important;
        background-color: blanchedalmond;
    }
</style>

@section('content')
    <div class="row">
        <h1 class="page-header text-center">Welcome to Your Affiliate Dashboard</h2>
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-solid" style="padding:20px;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Dashboard</a></li>
                        <li><a data-toggle="tab" href="#menu1">Get Affiliate Links</a></li>
                        <li><a data-toggle="tab" href="#menu2">Wallet</a></li>
                        <li><a data-toggle="tab" href="#menu3">Sales Bonus</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div style="margin:30px 0px" id="achivement">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="achivements_wrapper"
                                            style="background: linear-gradient(150deg, #f731db, #4600f1 100%);">
                                            <div class="achivement_text">
                                                <p>REFERRALS : <span style="font-size: 30px;">
                                                        {{ count(Auth::user()->referrals) ?? '0' }} </span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="achivements_wrapper"
                                            style="background: linear-gradient(150deg, #39ef74, #4600f1 100%);">
                                            <div class="achivement_text">
                                                <p>CUSTOMERS : <span style="font-size: 30px; color:aqua;">0</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="achivements_wrapper"
                                            style="background: linear-gradient(150deg, #f731db, #4600f1 100%);">
                                            <div class="achivement_text">
                                                <p>CLICK : <span
                                                        style="font-size: 30px; color:aqua;">{{ Auth::user()->click_count ?? '0' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="achivements_wrapper"
                                            style="background: linear-gradient(150deg, #39ef74, #4600f1 100%);">
                                            <div class="achivement_text">
                                                <p>UNPAID EARNINGS : <span style="font-size: 30px; color:aqua;">0</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-10">
                                    <div style="padding-left: 0px;">
                                        <div class="card"
                                            style="
                                            background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(164,167,166,0.6279645647321428) 0%, rgba(0,212,255,1) 100%);  padding:10px;">
                                            <h3>Profile Information</h3>

                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <b>Name</b>
                                                        </td>
                                                        <td>
                                                            {{ Auth::user()->username }}
                                                        </td>
                                                    </tr>
                                                    <tr class="table-active">
                                                        <td>
                                                            <b>Joining Date</b>
                                                        </td>
                                                        <td>
                                                            15-June-2023
                                                        </td>
                                                    </tr>
                                                    <tr class="table-success">
                                                        <td>
                                                            <b>Referral Link</b>
                                                        </td>
                                                        <td>
                                                            {{ Auth::user()->referral_link }}
                                                        </td>
                                                    </tr>
                                                    <tr class="table-warning">

                                                        <td>
                                                            <b>Mobile</b>
                                                        </td>
                                                        <td>
                                                            {{ Auth::user()->contact_number }}
                                                        </td>
                                                    </tr>
                                                    <tr class="table-danger">

                                                        <td>
                                                            <b>Email </b>
                                                        </td>
                                                        <td>
                                                            {{ Auth::user()->email }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12" style="padding-top: 30px;">
                                    <div class="card">
                                        {{-- <div class="card-header">Referal Customer
                                            ({{ count(Auth::user()->referrals) ?? '0' }})</div> --}}
                                        <div class="card-body">
                                            <table class="table" id="referlist-table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Business Name</th>
                                                        <th>Start Month</th>
                                                        <th>Date and Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($referlist as $referlist_info)
                                                        <tr>
                                                            <td>{{ $referlist_info->first_name }}</td>
                                                            <td>{{ $referlist_info->name }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($referlist_info->start_date)->format('F') }}
                                                            </td>
                                                            <td>{{ \Carbon\Carbon::parse($referlist_info->created_at)->format('d F Y, g:i A') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="card box" style="padding:15px;">
                                <div class="card-body">
                                    <h3>Below are your Affiliate links</h3>

                                    {!! $shareButtons !!}

                                    <input class="form-control" type="text" value="{{ Auth::user()->referral_link }}"
                                        id="textContent"><br>
                                    <button class="btn btn-primary" onclick="copyLink()">Copy Link</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="card box" style="padding:15px;">
                                <div class="card-body">
                                    <h3>Wallet</h3>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="achivements_wrapper"
                                                style="background: linear-gradient(150deg, #f731db, #4600f1 100%);">
                                                <div class="achivement_text">
                                                    <p>Available balance : <span style="font-size: 30px;">
                                                         0 </span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="achivements_wrapper"
                                                style="background: linear-gradient(150deg, #39ef74, #4600f1 100%);">
                                                <div class="achivement_text">
                                                    <p>Total Earning : <span style="font-size: 30px; color:aqua;">0</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class="card box" style="padding:15px;">
                                <div class="card-body">
                                    <h3>Sales Bonus</h3>
                                    <img style="margin-bottom: 10px;" src="{{ asset('uploads/affiliate.jpg') }}"
                                        alt="gloriousit" width="40%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </div>

    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#referlist-table').DataTable();
    });
</script>

<script>
    function copyLink() {
        var copyText = document.getElementById("textContent");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        alert("Copied the text: " + copyText.value);
    }
</script>
