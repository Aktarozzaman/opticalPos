<?php

namespace App\Http\Controllers;

use App\Business;
use App\Contact;
use App\NotificationSms;
use App\SmsHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class NotificationSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $draftMessages = NotificationSms::all();

        return view('sms_notification.index', compact('draftMessages'));
    }

    public function draftmessage($id)
    {
        $message = NotificationSms::where('id', $id)->first();

        return $message;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            if ($request->sms_status == 'send_sms_now') {
                if ($request->draft_message_id) {
                    $messageIdentify = NotificationSms::where('id', $request->draft_message_id)->first();
                    $messageDetals = $messageIdentify->message;
                    if ($request->message == $messageDetals) {
                        $contactInfos = Contact::where('type', $request->user_type)->get();
                        foreach ($contactInfos as $contact) {
                            $bussinessSetting = Business::first();
                            $smsAmount = $bussinessSetting->sms_amount;
                            if ($smsAmount != 0) {
                                //SMS configuration start 
                                $url = env('sms_url');
                                $api_key = env('api_key');
                                $senderid = env('senderid');
                                $number = $contact->mobile;
                                $message = $request->message;

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

                                $smshistory = [
                                    'notification_sms_id' => $messageIdentify->id,
                                    'user_type' => $request->user_type,
                                    'user_id' => auth()->user()->id
                                ];

                                SmsHistory::create($smshistory);

                                $bussinessSetting->update([
                                    'sms_amount' => $smsAmount - 1
                                ]);
                                //SMS configuration end 
                            } else {
                                $output = [
                                    'success' => 0,
                                    'msg' => __('Unavailabel message amount')
                                ];

                                return redirect()->back()->with('status', $output);
                                break;
                            }
                        }
                        DB::commit();
                        $output = [
                            'success' => 1,
                            'msg' => __('Message send successfully')
                        ];

                        return redirect()->back()->with('status', $output);
                    } else {
                        $contactInfos = Contact::where('type', $request->user_type)->get();
                        $data = $request->all();
                        $data['user_id'] = auth()->user()->id;

                        $sms = NotificationSms::create($data);
                        foreach ($contactInfos as $contact) {
                            $bussinessSetting = Business::first();
                            $smsAmount = $bussinessSetting->sms_amount;
                            if ($smsAmount != 0) {
                                //SMS configuration start 
                                $url = env('sms_url');
                                $api_key = env('api_key');
                                $senderid = env('senderid');
                                $number = $contact->mobile;
                                $message = $request->message;

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

                                $smshistory = [
                                    'notification_sms_id' => $sms->id,
                                    'user_type' => $request->user_type,
                                    'user_id' => auth()->user()->id
                                ];

                                SmsHistory::create($smshistory);

                                $bussinessSetting->update([
                                    'sms_amount' => $smsAmount - 1
                                ]);
                                //SMS configuration end
                            } else {
                                $output = [
                                    'success' => 0,
                                    'msg' => __('Unavailabel message amount')
                                ];

                                return redirect()->back()->with('status', $output);
                                break;
                            }
                        }
                        DB::commit();
                        $output = [
                            'success' => 1,
                            'msg' => __('Message send successfully')
                        ];

                        return redirect()->back()->with('status', $output);
                    }
                } else {
                    $contactInfos = Contact::where('type', $request->user_type)->get();
                    
                    $data = $request->all();
                    $data['user_id'] = auth()->user()->id;

                    $sms = NotificationSms::create($data);
                    foreach ($contactInfos as $contact) {
                        $bussinessSetting = Business::first();
                        $smsAmount = $bussinessSetting->sms_amount;
                        if ($smsAmount != 0) {
                            //SMS configuration start 
                            $url = env('sms_url');
                            $api_key = env('api_key');
                            $senderid = env('senderid');
                            $number = $contact->mobile;
                            $message = $request->message;

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

                            $smshistory = [
                                'notification_sms_id' => $sms->id,
                                'user_type' => $request->user_type,
                                'user_id' => auth()->user()->id
                            ];

                            SmsHistory::create($smshistory);

                            $bussinessSetting->update([
                                'sms_amount' => $smsAmount - 1
                            ]);
                            //SMS configuration end
                        } else {
                            $output = [
                                'success' => 0,
                                'msg' => __('Unavailabel message amount')
                            ];

                            return redirect()->back()->with('status', $output);
                            break;
                        }
                    }
                     

                    DB::commit();
                    $output = [
                        'success' => 1,
                        'msg' => __('Message send successfully')
                    ];

                    return redirect()->back()->with('status', $output);
                }
            } elseif ($request->sms_status == 'save_draft') {
                if ($request->draft_message_id) {
                    $messageIdentify = NotificationSms::where('id', $request->draft_message_id)->first();
                    $messageDetals = $messageIdentify->message;
                    if ($request->message == $messageDetals) {
                        $output = [
                            'success' => 0,
                            'msg' => __('Message already in  draft')
                        ];

                        return redirect()->back()->with('status', $output);
                    } else {
                        $data = $request->all();
                        $data['user_id'] = auth()->user()->id;

                        NotificationSms::create($data);
                        DB::commit();
                        $output = [
                            'success' => 1,
                            'msg' => __('Message Saved successfully')
                        ];

                        return redirect()->back()->with('status', $output);
                    }
                } else {
                    $data = $request->all();
                    $data['user_id'] = auth()->user()->id;

                    NotificationSms::create($data);
                    DB::commit();
                    $output = [
                        'success' => 1,
                        'msg' => __('Message Saved successfully')
                    ];

                    return redirect()->back()->with('status', $output);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();

            $output = [
                'success' => 1,
                'msg' => __('Somthing want wrong')
            ];

            return redirect()->back()->with('status', $output);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificationSms  $notificationSms
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationSms $notificationSms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationSms  $notificationSms
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationSms $notificationSms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationSms  $notificationSms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationSms $notificationSms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationSms  $notificationSms
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationSms $notificationSms)
    {
        //
    }
}
