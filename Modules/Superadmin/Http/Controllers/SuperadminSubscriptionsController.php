<?php

namespace Modules\Superadmin\Http\Controllers;

use App\Business;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\Subscription;
use Modules\Superadmin\Entities\Package;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Utils\BusinessUtil;

use App\System;

class SuperadminSubscriptionsController extends BaseController
{
    protected $businessUtil;

    /**
     * Constructor
     *
     * @param BusinessUtil $businessUtil
     * @return void
     */
    public function __construct(BusinessUtil $businessUtil)
    {
        $this->businessUtil = $businessUtil;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (!auth()->user()->can('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $superadmin_subscription = Subscription::join('business', 'subscriptions.business_id', '=', 'business.id')
                ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
                ->select('business.name as business_name', 'packages.name as package_name', 'subscriptions.status', 'subscriptions.start_date', 'subscriptions.trial_end_date', 'subscriptions.end_date', 'subscriptions.package_price', 'subscriptions.paid_via', 'subscriptions.payment_transaction_id', 'subscriptions.id');

            return DataTables::of($superadmin_subscription)
                ->addColumn(
                    'action',
                    '<button data-href ="{{action(\'\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@edit\',[$id])}}" class="btn btn-info btn-xs change_status" data-toggle="modal" data-target="#statusModal">
                            @lang( "superadmin::lang.status")
                            </button> <button data-href ="{{action(\'\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@editSubscription\',["id" => $id])}}" class="btn btn-primary btn-xs btn-modal" data-container=".view_modal">
                            @lang( "messages.edit")
                            </button>'
                )
                ->editColumn('trial_end_date', '@if(!empty($trial_end_date)){{@format_date($trial_end_date)}} @endif')
                ->editColumn('start_date', '@if(!empty($start_date)){{@format_date($start_date)}}@endif')
                ->editColumn('end_date', '@if(!empty($end_date)){{@format_date($end_date)}}@endif')
                ->editColumn(
                    'status',
                    '@if($status == "approved")
                                <span class="label bg-light-green">{{__(\'superadmin::lang.\'.$status)}}
                                </span>
                            @elseif($status == "waiting")
                                <span class="label bg-aqua">{{__(\'superadmin::lang.\'.$status)}}
                                </span>
                            @else($status == "declined")
                                <span class="label bg-red">{{__(\'superadmin::lang.\'.$status)}}
                                </span>
                            @endif'
                )
                ->editColumn(
                    'package_price',
                    '<span class="display_currency" data-currency_symbol="true">
                                {{$package_price}}
                            </span>'
                )
                ->removeColumn('id')
                ->rawColumns([2, 6, 9])
                ->make(false);
        }
        return view('superadmin::superadmin_subscription.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $business_id = request()->input('business_id');
        $packages = Package::active()->orderby('sort_order')->pluck('name', 'id');

        $gateways = $this->_payment_gateways();



        return view('superadmin::superadmin_subscription.add_subscription')
            ->with(compact('packages', 'business_id', 'gateways'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        if (!auth()->user()->can('subscribe')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();

            $input = $request->only(['business_id', 'package_id', 'paid_via', 'payment_transaction_id']);
            $package = Package::find($input['package_id']);
            $user_id = $request->session()->get('user.id');

            $total_month = 1;
            $total_package_price = 1000;
            $subscription =  $this->_add_subscription($input['business_id'], $package, $input['paid_via'], $input['payment_transaction_id'], $user_id, $total_month, $total_package_price, true);
            // dd($subscription);
            DB::commit();

            $output = [
                'success' => 1,
                'msg' => __('lang_v1.success')
            ];

            $url = env('sms_url');
            $api_key = env('api_key');
            $senderid = env('senderid');

            // QUERY TO FETCH ADDITIONAL CONTACT DATA
            $business_name = $subscription->business->name;
            $business_id = $subscription->business_id;
            // dd($subscription);
            // $business_name = ucwords($business_name);
            // $business_name = ltrim($business_name);
            // $business_name = rtrim($business_name);
            $subscription_pack = $package->name;
            $number = Contact::where('business_id', $subscription->business_id)
                    ->whereNotNull('mobile')
                    ->distinct()
                    ->pluck('mobile')
                    ->first();
            $message = "Dear $business_name($business_id),\n" . "Your Subscription for $subscription_pack is successfull.\n\n" . "Thank You";
            // dd($message);


            $data = [
                "api_key" => $api_key,
                "senderid" => $senderid,
                "number" => $number,
                "message" => $message
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = ['success' => 0, 'msg' => __('messages.something_went_wrong')];
        }

        return back()->with('status', $output);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('superadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $status = Subscription::package_subscription_status();
            $subscription = Subscription::find($id);

            return view('superadmin::superadmin_subscription.edit')
                ->with(compact('subscription', 'status'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            try {
                $input = $request->only(['status', 'payment_transaction_id']);

                $subscriptions = Subscription::findOrFail($id);

                $current_trail_find = Subscription::where('payment_transaction_id', 'FREE')
                    ->where('business_id', $subscriptions->business_id)
                    ->first();

                if ($current_trail_find) {

                    $start = $current_trail_find->start_date;
                    $end = $current_trail_find->end_date;

                    // Convert the dates to Carbon instances
                    $startDate = Carbon::parse($start);
                    $endDate = Carbon::parse($end);
                    $trailDayCount = Carbon::today()->diffInDays($endDate);

                    $total_months = $subscriptions->total_month; // Assuming value

                    // Get the current date
                    $currentDate = Carbon::now();

                    // Create a copy of the current date
                    $futureDate = $currentDate->copy()->addMonths($total_months);
                    // Calculate the total number of days between the current date and the future date
                    $dayCount = $currentDate->diffInDays($futureDate);

                    $remainingDays = $trailDayCount + $dayCount;

                    // dd($remainingDays);


                    if ($subscriptions->status != 'approved' && empty($subscriptions->start_date) && $input['status'] == 'approved') {

                        // $dates = $this->_get_package_dates($subscriptions->business_id, $subscriptions->package);

                        $dates = $this->_get_new_package_dates($subscriptions->business_id, $subscriptions->package, $remainingDays);

                        // dd($dates);

                        $subscriptions->start_date = Carbon::now();
                        $subscriptions->end_date = $dates['end'];
                        $subscriptions->trial_end_date = $dates['trial'];
                    }
                    $subscriptions->status = $input['status'];
                    $subscriptions->payment_transaction_id = $input['payment_transaction_id'];
                    $subscriptions->subscription_status = 1;
                    $subscriptions->save();

                    $output = array(
                        'success' => true,
                        'msg' => __("superadmin::lang.subcription_updated_success")
                    );
                } else {


                    if ($subscriptions->status != 'approved' && empty($subscriptions->start_date) && $input['status'] == 'approved') {


                        $start = $subscriptions->start_date;
                        $end = $subscriptions->end_date;

                        // Convert the dates to Carbon instances
                        $startDate = Carbon::parse($start);
                        $endDate = Carbon::parse($end);


                        $trailDayCount = Carbon::today()->diffInDays($endDate);

                        // Get the current date
                        $currentDate = Carbon::now();

                        $current_package = Subscription::where('business_id', $subscriptions->business_id)
                            ->where('subscription_status', 1)
                            ->whereDate('created_at', '<=', date('Y-m-d')) // Add condition for created_at
                            ->orderByDesc('created_at')
                            ->first();

                        if (is_null($current_package)) {

                            $existingPackageDayCount = 0;
                        } else {

                            $existingTotalMonths = $current_package->total_month;
                            // Create a copy of the current date
                            $existingFutureDate = $currentDate->copy()->addMonths($existingTotalMonths);
                            // Calculate the total number of days between the current date and the future date
                            $existingPackageDayCount = $currentDate->diffInDays($existingFutureDate);
                        }


                        $total_months = $subscriptions->total_month; // Assuming value

                        // Create a copy of the current date
                        $futureDate = $currentDate->copy()->addMonths($total_months);

                        // Calculate the total number of days between the current date and the future date
                        $dayCount = $currentDate->diffInDays($futureDate);
                        $remainingDays = $trailDayCount + $dayCount + $existingPackageDayCount;


                        $dates = $this->_get_new_package_dates($subscriptions->business_id, $subscriptions->package, $remainingDays);

                        // $dates = $this->_get_package_dates($subscriptions->business_id, $subscriptions->package);

                        $subscriptions->start_date = $dates['start'];
                        $subscriptions->end_date = $dates['end'];
                        $subscriptions->trial_end_date = $dates['trial'];
                    }
                    $subscriptions->status = $input['status'];
                    $subscriptions->payment_transaction_id = $input['payment_transaction_id'];
                    $subscriptions->subscription_status = 1;
                    $subscriptions->save();

                    $output = array(
                        'success' => true,
                        'msg' => __("superadmin::lang.subcription_updated_success")
                    );
                }
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = array(
                    'success' => false,
                    'msg' => __("messages.something_went_wrong")
                );
            }
            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editSubscription($id)
    {
        if (!auth()->user()->can('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $subscription = Subscription::find($id);

            return view('superadmin::superadmin_subscription.edit_date_modal')
                ->with(compact('subscription'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateSubscription(Request $request)
    {
        if (!auth()->user()->can('superadmin')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            try {
                $input = $request->only(['start_date', 'end_date', 'trial_end_date']);
                $subscription = Subscription::findOrFail($request->input('subscription_id'));
                $subscription->start_date = !empty($input['start_date']) ? $this->businessUtil->uf_date($input['start_date']) : null;
                $subscription->end_date = !empty($input['end_date']) ? $this->businessUtil->uf_date($input['end_date']) : null;
                $subscription->trial_end_date = !empty($input['trial_end_date']) ? $this->businessUtil->uf_date($input['trial_end_date']) : null;

                $subscription->save();

                $output = array(
                    'success' => true,
                    'msg' => __("superadmin::lang.subcription_updated_success")
                );
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = array(
                    'success' => false,
                    'msg' => __("messages.something_went_wrong")
                );
            }
            return $output;
        }
    }
}
