<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Business;
use Illuminate\Http\Request;


class AffiliateController extends Controller
{
    public function index()
    {
        // $data = session()->all();
        // dd($data);

        if (!auth()->user() == true) {
            return view('affiliat.registration');
        }

        $id = request()->session()->get('user.id');

        $referlist = Business::select('users.id', 'users.first_name', 'business.start_date', 'users.referrer_id', 'business.name')
        ->leftJoin('users', 'business.owner_id', '=', 'users.id')
        ->where('users.referrer_id', $id)
        ->get();

        $referal_commission = 15;

        $shareButtons = \Share::page(
            auth()->user()->referral_link
        )
            ->facebook()

            ->twitter()

            ->linkedin()

            ->telegram()

            ->whatsapp()

            ->reddit();

        return view('affiliat.dashboard', compact('referlist', 'shareButtons', 'referal_commission'));
    }

    public function getRegister()
    {
        return view('affiliat.registration');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'contact_number' => 'required|max:11',
        ]);

        $userDetails = [
            'first_name' => $request->first_name,
            'username' => $request->username,
            'contact_number' => $request->contact_number,
            'user_type' => 'promoter',
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            $user = User::create_affiliate_user($userDetails);
        } catch (\Exception $e) {
            // Handle the exception or log the error
            return back()->withInput()->withErrors('Error saving user: ' . $e->getMessage());
        }
        $output = [
            'success' => 1,
            'msg' => __('Affiliate Account Created Successfully')
        ];

        return redirect('login')->with('status', $output);
    }
}
