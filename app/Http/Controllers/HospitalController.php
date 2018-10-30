<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HospitalController extends Controller
{
    public function account()
    {
        return view('back.pages.hospital.main');
    }

//Account setting functions
    public function accountSetting()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
      //  return $user->id;
        $abroad = DB::table('treatment_abroad')->where('user_id', $user->id)->first();
        return view('back.pages.hospital.account_setting')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('user', $user)
            ->with('abroad', $abroad);

    }

    public function updateHospital($user_id, Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'hospital' =>'required'
        ]);
        DB::table('users')->where('id', $user_id)->update(array(
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'u_address' => $request->address,
            'u_country' => $request->country,
            'u_governorate' => $request->governorate,
            'u_city' => $request->city,
        ));
        DB::table('treatment_abroad')->where('user_id', $user_id)->update(array(
            'hospital' => $request->hospital,
        ));

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }
}
