<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Business;
use App\BusinessLocation;
use App\Contact;
use App\System;
use App\User;
use App\Utils\ModuleUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Template;
use App\Group;
use App\GroupContact;
use App\NotificationSms;
use App\MessageHistory;
use App\SMSBuyHistory;
use App\MessageSetting;
use App\Transaction;

class MessageController extends ContactController
{
    public function index()
    {

        $businessId = request()->user()->business_id;

        $sumSmsCount = SMSBuyHistory::where('status', 1)
            ->where('business_id', $businessId)
            ->sum('sms_count');

        $settings = MessageSetting::where('business_id', auth()->user()->business_id)->first();
        $business = Business::where('id', $businessId)->first();

        return view('message.index', compact('settings', 'sumSmsCount', 'business'));
    }


    public function sendSms()
    {
        $draftMessages = NotificationSms::all();

        $template = Template::all();

        $business_id = request()->user()->business_id;

        $contacts = Contact::where('business_id', $business_id)->get(['mobile', 'name']);


        $groups = Group::all();
        $bussinessSetting = Business::where('id', $business_id)->first();
        $smsAmount = $bussinessSetting->sms_amount;

        return view('message.sendSms', compact('draftMessages', 'template', 'contacts', 'groups', 'smsAmount'));
    }



    public function messageHistory()
    {
        $business_id = request()->user()->business_id;
        $smsHistoryList = MessageHistory::where('business_id', $business_id)->get();
        return view('message.messageHistory', compact('smsHistoryList'));
    }


    public function smsTemplate()
    {

        $business_id = request()->user()->business_id;
        $templateListings = Template::where('business_id', $business_id)->paginate(10);

        return view('message.smsTemplate', compact('templateListings'));
    }

    public function groupSms()
    {
        $business_id = request()->user()->business_id;
        $groupListings = Group::where('business_id', $business_id)->get();
        return view('message.groupSms', compact('groupListings'));
    }

    public function buySms()
    {

        $business_id = request()->user()->business_id;
        $buySMSListings = SMSBuyHistory::where('business_id', $business_id)
            ->where('status', 1)
            ->get();

        return view('message.buySms', compact('buySMSListings'));
    }

    public function pay(Request $request)
    {

        $quantity = $request->input('quantity');
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');
        $user = User::where('id', $user_id)->first();

        // Retrieve form data
        $packageId = 10;
        $packageName = 'SMS Pack';

        $userName = $user->first_name;
        $id = $user_id;

        $randomNumber = rand(100, 999);

        $template = SMSBuyHistory::create([
            'business_id' => $business_id,
            'mobile_number' => '',
            'sms_count' => $quantity,
            'rand_number' => $randomNumber,
            'purches__date' => date('Y-m-d H:i:s'),
            'amount' => $request->amount,
            'status' => 0,
        ]);



        $lastRandNumber = SMSBuyHistory::orderByDesc('id')->value('rand_number');

        // return redirect()->route('message.buySms')->with('success', 'Template Purcshes successfully');

        $url = 'https://bkash.sumondutta.com/bkash/payment' .
            '?packageId=' . urlencode($packageId) .
            '&packageName=' . urlencode($packageName) .
            '&price=' . urlencode($request->amount) .
            '&userName=' . urlencode($userName) .
            '&rand_number=' . urlencode($lastRandNumber) .
            '&sms_count=' . urlencode($quantity) .
            '&id=' . urlencode($id) .
            '&from=sms';
        return Redirect::away($url);
    }

    // Template Create
    public function templateListing()
    {
        return view('message.templateCreate');
    }

    public function templateCreate(Request $request)
    {
        $title_template = $request->input('title_template');
        $template_message = $request->input('template_message');

        $business_id = request()->session()->get('user.business_id');

        $template = Template::create([
            'title_template' => $title_template,
            'template_message' => $template_message,
            'business_id' => $business_id,
        ]);
        return redirect()->route('message.smsTemplate')->with('success', 'Template Created successfully');
    }


    public function templateEdit($id)
    {
        $template = Template::findOrFail($id);
        return view('message.templateEdit', compact('template'));
    }

    public function templateUpdate(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $template->title_template = $request->input('title_template');
        $template->template_message = $request->input('template_message');
        $template->save();
        return redirect()->route('message.smsTemplate')->with('success', 'Template updated successfully');
    }

    public function templateDestroy($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();
        return redirect()->route('message.smsTemplate')->with('success', 'Template deleted successfully');
    }


    // Group Create
    public function groupListing()
    {
        return view('message.groupCreate');
    }



    public function groupCreate(Request $request)
    {
        $group_name = $request->input('group_name');
        $group_contacts = $request->input('group_contacts');
        $business_id = request()->session()->get('user.business_id');

        $group = Group::create([
            'group_name' => $group_name,
            'business_id' => $business_id,
        ]);


        foreach ($group_contacts as $contact) {
            GroupContact::create([
                'group_id' => $group->id,
                'mobile_number' => $contact,
            ]);
        }

        return redirect()->route('message.groupSms')->with('success', 'Group created successfully');
    }



    public function groupEdit($id)
    {
        $group = Group::findOrFail($id);
        return view('message.groupEdit', compact('group'));
    }

    // public function groupUpdate(Request $request, $id)
    // {
    //     $group = Group::findOrFail($id);
    //     $group->group_name = $request->input('group_name');
    //     $group->group_contacts = $request->input('group_contacts');
    //     $group->save();
    //     return redirect()->route('message.groupSms')->with('success', 'Group updated successfully');
    // }



    public function groupUpdate(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->group_name = $request->input('group_name');
        $group->save();

        // Update contacts
        $group_contacts = $request->input('group_contacts');
        $group->GroupContact()->delete(); // Remove existing contacts

        foreach ($group_contacts as $contact) {
            $group->GroupContact()->create([
                'mobile_number' => $contact,
            ]);
        }

        return redirect()->route('message.groupSms')->with('success', 'Group updated successfully');
    }


    public function groupDestroy($id)
    {
        $group = Group::findOrFail($id);

        // Delete the associated contacts
        $group->GroupContact()->delete();

        // Delete the group
        $group->delete();

        return redirect()->route('message.groupSms')->with('success', 'Group deleted successfully');
    }

    public function templateSMSFind($id)
    {
        $message = Template::where('id', $id)->first();

        return $message;
    }

    public function singleSMSSend(Request $request)
    {

        $business_id = request()->session()->get('user.business_id');
        $bussinessSetting = Business::where('id', $business_id)->first();
        $smsAmount = $bussinessSetting->sms_amount;

        if ($smsAmount === null || $smsAmount === 0) {
            // echo "SMS not available, please buy an SMS package";
            return redirect()->route('message.sendSms')->with('fail', 'SMS not available, please buy an SMS package!');
        } else {

            $mobileNumbers = $request->input('mobile_number');
            $message = $request->input('message');
            $smsCount = strlen($message);
            $business_id = request()->user()->business_id;

            $url = env('sms_url');
            $api_key = env('api_key');
            $senderid = env('senderid');

            foreach ($mobileNumbers as $number) {
                $contact_id = Contact::where('mobile', $request->input('mobile_number'))->pluck('id')->first();
                $customer_due = $this->getContactDue($contact_id);

                // QUERY TO FETCH ADDITIONAL CONTACT DATA
                $customer_name = Contact::where('id', $contact_id)->pluck('name')->first();
                $customer_name = ucwords($customer_name);
                $customer_name = ltrim($customer_name);
                $customer_name = rtrim($customer_name);

                if ($customer_due == "") {
                    $customer_due = "৳ 0";
                }

                // REPLACING THE MESSAGE TAGS WITH CONTACT DATA
                $customer_message = str_replace("[name]", $customer_name, $message);
                $customer_message = str_replace("[due]", $customer_due, $customer_message);

                $data = [
                    "api_key" => $api_key,
                    "senderid" => $senderid,
                    "number" => $number,
                    // "number"=>"01700000000",
                    "message" => $customer_message
                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);

                // Process the response as needed
                // dd($response);
                $data = json_decode($response, true);
                $responseCode = $data['response_code'];

                if ($responseCode == '202') {
                    $mobileNumbersJSON = json_encode($mobileNumbers);

                    $messageHistory = new MessageHistory();
                    $messageHistory->fill([
                        'business_id' => $business_id,
                        'mobile_number' => $mobileNumbersJSON,
                        'temp_message_id' => $request->input('temp_message_id'),
                        'message' => $customer_message,
                        'status' => 0,
                        'sms_count' => $smsCount,
                        'sms_type' => 'single',
                        'response' => $response,
                    ]);
                    $messageHistory->save();

                    // sms minus main balance 
                    Business::where('id', $business_id)->update([
                        'sms_amount' => $smsAmount - 1,
                    ]);

                    return redirect()->route('message.sendSms')->with('success', 'SMS Sent Successfully');
                } elseif ($responseCode == '1003') {
                    return redirect()->route('message.sendSms')->with('fail', 'Phone number not found!');
                } elseif ($responseCode == '1005') {
                    return redirect()->route('message.sendSms')->with('fail', 'Invalid phone number!');
                } elseif ($responseCode == '1007') {
                    return redirect()->route('message.sendSms')->with('fail', 'Insufficient Balance! Please contact GloriousIT.');
                } else {
                    return redirect()->route('message.sendSms')->with('fail', 'SMS was not sent!');
                }
            }
        }
    }


    public function groupSMSSend(Request $request)
    {

        $business_id = request()->session()->get('user.business_id');
        $bussinessSetting = Business::where('id', $business_id)->first();
        $smsAmount = $bussinessSetting->sms_amount;

        if ($smsAmount === null || $smsAmount === 0) {
            // echo "SMS not available, please buy an SMS package";
            return redirect()->route('message.sendSms')->with('fail', 'SMS not available, please buy an SMS package');
        } else {

            if ($request->group_user_type == 'all_customer') {

                $group_id = $request->group_user_type;
                $message = $request->message;
                $business_id = request()->user()->business_id;
                $smsCount = strlen($message);

                $getmobileNumbers = Contact::where('type', 'customer')
                    ->where('business_id', $business_id)
                    ->whereNotNull('mobile')
                    ->distinct()
                    ->pluck('mobile')
                    ->toArray();

                $mobileNumbers = array_filter($getmobileNumbers, function ($value) {
                    return ($value !== "" && $value !== "0");
                });

                $url = env('sms_url');
                $api_key = env('api_key');
                $senderid = env('senderid');

                foreach ($mobileNumbers as $number) {

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
                    // Process the response as needed

                    $data = json_decode($response, true);
                    // dd($data);
                    $responseCode = $data['response_code'];

                    if ($responseCode == '202') {
                        $mobileNumbersJSON = json_encode($mobileNumbers);

                        $messageHistory = new MessageHistory();
                        $messageHistory->fill([
                            'business_id' => $business_id,
                            'mobile_number' => $mobileNumbersJSON,
                            'temp_message_id' => $request->input('temp_message_id'),
                            'message' => $message,
                            'status' => 0,
                            'sms_count' => $smsCount,
                            'sms_type' => 'Group',
                            'response' => $response,
                        ]);
                        // sms minus main balance 
                        Business::where('id', $business_id)->update([
                            'sms_amount' => $smsAmount - 1,
                        ]);

                        $messageHistory->save();
                    } elseif ($responseCode == '1007') {
                        return redirect()->route('message.sendSms')->with('fail', 'Insufficient Balance! Please contact GloriousIT.');
                    }
                }
                return redirect()->route('message.sendSms')->with('success', 'SMS sent successfully');
            } elseif ($request->group_user_type == 'all_supplier') {

                $group_id = $request->group_user_type;
                $message = $request->message;
                $business_id = request()->user()->business_id;
                $smsCount = strlen($message);

                $getmobileNumbers = Contact::where('type', 'supplier')
                    ->where('business_id', $business_id)
                    ->whereNotNull('mobile')
                    ->distinct()
                    ->pluck('mobile')
                    ->toArray();


                $url = env('sms_url');
                $api_key = env('api_key');
                $senderid = env('senderid');

                $mobileNumbers = array_filter($getmobileNumbers, function ($value) {
                    return ($value !== "" && $value !== "0");
                });

                foreach ($mobileNumbers as $number) {
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
                    // Process the response as needed
                    $data = json_decode($response, true);
                    $responseCode = $data['response_code'];
                    if ($responseCode == '202') {
                        $mobileNumbersJSON = json_encode($mobileNumbers);

                        $messageHistory = new MessageHistory();
                        $messageHistory->fill([
                            'business_id' => $business_id,
                            'mobile_number' => $mobileNumbersJSON,
                            'temp_message_id' => $request->input('temp_message_id'),
                            'message' => $message,
                            'status' => 0,
                            'sms_count' => $smsCount,
                            'sms_type' => 'Group',
                            'response' => $response,
                        ]);
                        $messageHistory->save();
                        // sms minus main balance 
                        Business::where('id', $business_id)->update([
                            'sms_amount' => $smsAmount - 1,
                        ]);
                    } elseif ($responseCode == '1007') {
                        return redirect()->route('message.sendSms')->with('fail', 'Insufficient Balance! Please contact GloriousIT.');
                    }
                }
                return redirect()->route('message.sendSms')->with('success', 'SMS sent successfully');
            } elseif ($request->group_user_type == 'due_customer') {
                $group_id = $request->group_user_type;
                $message = $request->message;
                $business_id = request()->user()->business_id;
                $smsCount = strlen($message);
                $customerMobileNumbers = Contact::join('transactions', 'contacts.id', '=', 'transactions.contact_id')
                    ->where('contacts.type', 'customer')
                    ->where('contacts.business_id', $business_id)
                    ->where('transactions.payment_status', 'due')
                    ->whereNotNull('contacts.mobile')
                    ->whereNotIn('contacts.mobile', ["", 0])
                    ->pluck('contacts.id', 'contacts.mobile');

                $url = env('sms_url');
                $api_key = env('api_key');
                $senderid = env('senderid');

                foreach ($customerMobileNumbers as $customer_number => $customer_id) {
                    $customer_due = $this->getContactDue($customer_id);

                    // QUERY TO FETCH ADDITIONAL CONTACT DATA
                    $customer_name = Contact::where('id', $customer_id)->pluck('name')->first();
                    $customer_name = ucwords($customer_name);
                    $customer_name = ltrim($customer_name);
                    $customer_name = rtrim($customer_name);

                    $customer_due = Transaction::where('business_id', $business_id)
                        ->where('contact_id', $customer_id)
                        ->where('payment_status', 'due')
                        ->sum('final_total');

                    // REPLACING THE MESSAGE TAGS WITH CONTACT DATA
                    $customer_message = str_replace("[name]", $customer_name, $message);
                    $customer_message = str_replace("[due]", $customer_due, $customer_message);

                    $data = [
                        "api_key" => $api_key,
                        "senderid" => $senderid,
                        "number" => $customer_number,
                        "message" => $customer_message
                    ];

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    // Process the response as needed

                    $data = json_decode($response, true);
                    $responseCode = $data['response_code'];

                    if ($responseCode == '202') {
                        $mobileNumbersJSON = json_encode($customer_number);

                        $messageHistory = new MessageHistory();
                        $messageHistory->fill([
                            'business_id' => $business_id,
                            'mobile_number' => $mobileNumbersJSON,
                            'temp_message_id' => $request->input('temp_message_id'),
                            'message' => $customer_message,
                            'status' => 0,
                            'sms_count' => $smsCount,
                            'sms_type' => 'Group',
                            'response' => $response,
                        ]);
                        // sms minus main balance 
                        Business::where('id', $business_id)->update([
                            'sms_amount' => $smsAmount - 1,
                        ]);
                        $messageHistory->save();
                    } elseif ($responseCode == '1007') {
                        return redirect()->route('message.sendSms')->with('fail', 'Insufficient Balance! Please contact GloriousIT.');
                    }
                }
                return redirect()->route('message.sendSms')->with('success', 'SMS sent successfully');
            } else {
                $group_id = $request->group_user_type;
                $message = $request->message;
                $mobileNumbers = GroupContact::where('group_id', $group_id)->pluck('mobile_number')->toArray();

                $smsCount = strlen($message);
                $business_id = request()->user()->business_id;

                $url = env('sms_url');
                $api_key = env('api_key');
                $senderid = env('senderid');

                foreach ($mobileNumbers as $number) {
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
                    // Process the response as needed


                    $data = json_decode($response, true);
                    $responseCode = $data['response_code'];

                    if ($responseCode == '202') {
                        $mobileNumbersJSON = json_encode($mobileNumbers);

                        $messageHistory = new MessageHistory();
                        $messageHistory->fill([
                            'business_id' => $business_id,
                            'mobile_number' => $mobileNumbersJSON,
                            'temp_message_id' => $request->input('temp_message_id'),
                            'message' => $message,
                            'status' => 0,
                            'sms_count' => $smsCount,
                            'sms_type' => 'Group',
                            'response' => $response,
                        ]);
                        $messageHistory->save();
                        // sms minus main balance 
                        Business::where('id', $business_id)->update([
                            'sms_amount' => $smsAmount - 1,
                        ]);
                    } elseif ($responseCode == '1007') {
                        return redirect()->route('message.sendSms')->with('fail', 'Insufficient Balance! Please contact GloriousIT.');
                    }
                }
                return redirect()->route('message.sendSms')->with('success', 'SMS sent successfully');
            }
        }
    }


    public function saveSettings(Request $request)
    {
        $enableSale = $request->input('enable_sale') ? true : false;
        $enableSaleReturn = $request->input('enable_sale_return') ? true : false;
        $enableSaleReplace = $request->input('enable_sale_replace') ? true : false;
        $enableDueReceive = $request->input('enable_due_receive') ? true : false;
        $enableDuePayment = $request->input('enable_due_payment') ? true : false;
        $enableInstallment = $request->input('enable_installment') ? true : false;

        $businessId = request()->user()->business_id;

        // Check if a setting already exists for the business ID
        $setting = MessageSetting::where('business_id', $businessId)->first();

        if ($setting) {
            // Update the existing setting
            $setting->enable_sale = $enableSale;
            $setting->enable_sale_return = $enableSaleReturn;
            $setting->enable_sale_replace = $enableSaleReplace;
            $setting->enable_due_receive = $enableDueReceive;
            $setting->enable_due_payment = $enableDuePayment;
            $setting->enable_installment = $enableInstallment;
            $setting->save();
        } else {
            // Create a new setting
            $setting = new MessageSetting();
            $setting->business_id = $businessId;
            $setting->enable_sale = $enableSale;
            $setting->enable_sale_return = $enableSaleReturn;
            $setting->enable_sale_replace = $enableSaleReplace;
            $setting->enable_due_receive = $enableDueReceive;
            $setting->enable_due_payment = $enableDuePayment;
            $setting->enable_installment = $enableInstallment;
            $setting->save();
        }

        return redirect()->route('message.buySms')->with('success', 'Settings saved successfully');
    }


    public function subscribeactive(Request $request)
    {

        $uId = $request->user_id;
        $pId = $request->package_id;
        $tId = $request->transaction_id;
        $famount = $request->final_amount;
        $rNumber = $request->rand_number;
        $sCount = $request->sms_count;

        $updatedata = DB::table('s_m_s_buy_histories')
            ->where('rand_number', '=', $rNumber)
            ->update(['status' => 1]);

        if ($updatedata) {

            $bussinessSetting = Business::where('owner_id', $uId)->first();

            $smsAmount = $bussinessSetting->sms_amount;

            $availableSMS = $smsAmount + $sCount;

            $final = $bussinessSetting->update([
                'sms_amount' => $availableSMS
            ]);

            return response()->json(['message' => $final]);
        } else {
            return response()->json(['message' => 'Buy SMS Issue Found']);
        }
    }
}
