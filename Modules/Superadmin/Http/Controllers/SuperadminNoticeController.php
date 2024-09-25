<?php

namespace Modules\Superadmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\SuperadminNotice;
use Yajra\DataTables\Facades\DataTables;

use App\SMSBuyHistory;

class SuperadminNoticeController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit()
    {

        $notice_message = SuperadminNotice::firstOrCreate(['id' => 1]);

        return view('superadmin::superadmin_notice.edit', compact('notice_message'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {

        $notice_message = SuperadminNotice::first();
        $notice_message->notice_message = $request->notice_message;
        $notice_message->save();

        $output = ['success' => 1, 'msg' => __('lang_v1.success')];

        return redirect()
            ->action('\Modules\Superadmin\Http\Controllers\SuperadminNoticeController@edit')
            ->with('status', $output);
    }


    public function messageInfo()
    {
        $totalAmount = SMSBuyHistory::where('status', '1')->sum('amount');

        return view('superadmin::message.index', compact('totalAmount'));
    }

    public function getSMSInformation()
    {


        $info = SMSBuyHistory::select('s_m_s_buy_histories.id', 's_m_s_buy_histories.business_id', 'business.name', 's_m_s_buy_histories.mobile_number', 's_m_s_buy_histories.sms_count', 's_m_s_buy_histories.purches__date', 's_m_s_buy_histories.amount', 's_m_s_buy_histories.status', 's_m_s_buy_histories.created_at')
            ->join('business', 'business.id', '=', 's_m_s_buy_histories.business_id')
            ->where('status', 1)
            ->get();


        return Datatables::of($info)
            ->addColumn('action', function ($info) {
                $html = '';
                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
