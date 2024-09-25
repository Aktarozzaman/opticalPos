<?php

namespace Modules\Superadmin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\BusinessLocation;
use App\Contact;
use App\System;
use App\User;
use App\Utils\ModuleUtil;
use DB;
use App\Charts\CommonChart;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Activitylog\Models\Activity;
use Modules\Superadmin\Entities\Subscription;

use \Carbon;
use Modules\Superadmin\Entities\Package;
class CouponController extends BaseController
{
    //
    public  function index()
    {
        if (!auth()->user()->can('trial_users.view')) {
            abort(403, 'Unauthorized action.');
        }

        $currency = System::getCurrency();
        if (request()->ajax()) {
            $date_today = \Carbon::today();
            $not_subscribed = Business::with('subscriptions', 'owner', 'business_contact_number')
                ->whereDoesntHave('subscriptions', function ($query) {
                    $query->where('package_id', '!=', 1);
                })->latest()
                ->get();
            return Datatables::of($not_subscribed)
                ->addColumn('name', function ($not_subscribed) {
                    return $not_subscribed->name;
                })
                ->addColumn('created_at', function ($not_subscribed) {
                    return $not_subscribed->created_at;
                })
                ->addColumn('business_id', function ($not_subscribed) {
                    return $not_subscribed->id;
                })
                ->addColumn('owner_name', function ($not_subscribed) {
                    return $not_subscribed->owner->first_name;
                })
                ->addColumn('email', function ($not_subscribed) {
                    return $not_subscribed->owner->email;
                })
                ->addColumn('contact_no', function ($not_subscribed) {
                    return $not_subscribed->contact_no;
                })

                ->addColumn('business_contact_number', function ($not_subscribed) {
                    $mobile = $not_subscribed->business_contact_number[0]['mobile'];
                    $alternateNumber = $not_subscribed->business_contact_number[0]['alternate_number'];

                    // Check if both mobile and alternate number are available
                    if (!empty($mobile) && !empty($alternateNumber)) {
                        return " $mobile, $alternateNumber";
                    } elseif (!empty($mobile)) {
                        return " $mobile";
                    } elseif (!empty($alternateNumber)) {
                        return " $alternateNumber";
                    }

                    return ''; // If neither mobile nor alternate number is available
                })
                ->addColumn('address', function ($not_subscribed) {
                    $city = $not_subscribed->business_contact_number[0]['city'];
                    $state = $not_subscribed->business_contact_number[0]['state'];
                    $country = $not_subscribed->business_contact_number[0]['country'];
                    $landmark = $not_subscribed->business_contact_number[0]['landmark'];
                    return "$city, $state, $country, $landmark";
                })
                ->addColumn('is_active', function ($not_subscribed) {
                    return  $not_subscribed->is_active;
                })

                ->make(true);
        }
        return view('superadmin::coupon.coupon_index');
    }
}
