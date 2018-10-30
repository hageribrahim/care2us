<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Pharmacy;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Validator;


class RegistrationController extends Controller
{

    public $message;
    public $success_status = 200;
    public $failed_status = 401;

    ////////api
    public function getcountry()
    {
        $countries = DB::table('countries')->get();

        return response()->json([
            'version' => '1.0',
            'type' => 'success',
            'countries' => $countries,
        ], $this->success_status);

    }

    public function getgovernate($city_id)
    {
        $governate = DB::table('governorates')->where('country_id', $city_id)->get();
        return response()->json([
            'version' => '1.0',
            'type' => 'success',
            'governate' => $governate,
        ], $this->success_status);
    }
    public function getcity($id)
    {
        $city =  DB::table('cities')->where('gov_id',$id )->get();
        return response()->json([
            'version' => '1.0',
            'type' => 'success',
            'city' => $city,
        ], $this->success_status);
    }



    public function doctype()
    {
        $doc_type = DB::table('doc_type')->get();
        return response()->json([
            'version' => '1.0',
            'type' => 'success',
            'doc_type' => $doc_type,
        ], $this->success_status);
    }


    public function userStore(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'governorate' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'image' => 'required',
            'home_clinc' => 'required',
            'doc_type' => 'required',

        ];
        $messages = [
            'username.required' => "the username is required",
            'username.unique' => "the username must be unique",
            'email.required' => "the email is required",
            'email.unique' => "the email is unique",
            'password.required' => "the password is required",
            'password.confirmed' => "the password must be matching",
            'phone.required' => "the phone is required",
            'mobile.required' => "the mobile is required",
            'address.required' => "the address is required",
            'country.required' => "the country is required",
            'governorate.required' => "the governor is required",
            'city.required' => "the city is required",
            'home_clinc.required' => "the home_clinic is required",
            'doc_type.required' => "the doc_type is required",
            'image.required' => "the image is required",

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $user = new User;

            if ($request['image'] != '') {
                $file = $request->file('image');
                $path = public_path() . '/images/profile';
                $filename = time() . rand(11111, 00000) . '.' . $file->getClientOriginalExtension();
                if ($file->move($path, $filename)) {
                    $user->image = $filename;
                }
            }

            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->mobile = $request->mobile;
            $user->u_type = 3;
            $user->client_type = $request->client_type;
            $user->status = 1;
            $user->u_country = $request->country;
            $user->u_city = $request->governorate;
            $user->u_governorate = $request->city;
            $user->u_address = $request->address;
            $user->password = bcrypt($request->password);
            $confirmation_code = str_random(30);
            $user->confirmation_code = $confirmation_code;
            $user->confirmed = 0;
            $client = new Client();
            $user->client_type = $request->client_type;
            $client->home_clinc = $request->home_clinc;
            $client->doc_type = $request->doc_type;
            $client->c_fname = $request->username;
            $client->client_type = $request->client_type;
            $user->save();
            $client->user_id = $user->id;
            $client->save();

            return response()->json([
                'version' => '1.0',
                'type' => 'success',
            ], $this->success_status);
        } else {
            foreach ((array)$validator->errors() as $error) {

                if (isset($error['username'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['username'][0]

                    ], $this->failed_status);
                }

                if (isset($error['email'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['email'][0]

                    ], $this->failed_status);
                }

                if (isset($error['password'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['password'][0]

                    ], $this->failed_status);
                }

                if (isset($error['phone'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['phone'][0]
                    ], $this->failed_status);
                }

                if (isset($error['mobile'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['mobile'][0]
                    ], $this->failed_status);
                }

                if (isset($error['address'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['address'][0]
                    ], $this->failed_status);
                }

                if (isset($error['country'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['country'][0]
                    ], $this->failed_status);
                }

                if (isset($error['governorate'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['governorate'][0]
                    ], $this->failed_status);
                }

                if (isset($error['city'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['city'][0]
                    ], $this->failed_status);
                }

                if (isset($error['home_clinc'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['home_clinc'][0]
                    ], $this->failed_status);
                }

                if (isset($error['doc_type'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['doc_type'][0]
                    ], $this->failed_status);
                }

                if (isset($error['image'])) {
                    return response()->json([
                        'version' => '1.0',
                        'type' => 'error',
                        'message' => $error['image'][0]
                    ], $this->failed_status);
                }

            }
        }

    }

    public function pharmacyStore(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:255|unique:users',
            'pharmacy_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|string|max:255',
            'pharmacy_phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'governorate' => 'required',
            'mobile' => 'required',
            'city' => 'required',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return response(['status' => false, 'messages' => $validator->messages()]);
        }else{
            $user = new User;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->pharmacy_phone;
            $user->mobile = $request->mobile;
            $user->u_type = 4;
            $user->status = 1;
            $user->u_country = $request->country;
            $user->u_city = $request->governorate;
            $user->u_governorate = $request->city;
            $user->u_address = $request->address;
            $user->password = bcrypt($request->password);
            $user->confirmation_code = str_random(30);
            $user->confirmed = 0;
            $user->save();
            $pharmacy = new Pharmacy;
            $pharmacy->user_id = $user->id;
            $pharmacy->pharm_name = $request->pharmacy_name;
            $pharmacy->save();

            return response(['status' => true,'message' => trans('تم التسجيل بنجاح')]);
        }
    }


    public function login()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return response(['status' => false, 'messages' => $validator->messages()]);
        } else {
            if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
                $user = Auth::user();
                $user->remember_token = str_random(60);
                $user->api_token = str_random(60);
                $user->save();
                if ($user->u_type == 4) {
                    $pharmacy = Pharmacy::where('user_id', '=', $user->id)->first();
                    return response(['status' => true, 'user' => $user, 'level' => $user->level, 'pharmacy' => $pharmacy, 'token' => $user->api_token, 'message' => trans('api.loginsuccess')]);
                } else {
                    return response(['status' => true, 'user' => $user, 'level' => $user->level, 'token' => $user->api_token, 'message' => trans('api.loginsuccess')]);

                }

            } else {
                return response(['status' => false, 'message' => 'البريد الالكتروني او الرقم السرى غير صحيح']);
            }
        }
    }

    public function logout(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->api_token = null;
        $user->save();
        return response(['status' => true, 'message' => 'تم تسجيل الخروج بنجاح']);
    }


    public function updatepharmacy(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->api_token === $request->token && $user->api_token !== null ) {
            $rules = [
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'pharmacy_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'password' => 'required|string|min:6|confirmed',
                'mobile' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'governorate' => 'required',
                'mobile' => 'required',
                'city' => 'required',
                     ];

            $validator = Validator::make(request()->all(), $rules);
            if ($validator->fails()) {
                return response(['status' => false, 'messages' => $validator->messages()]);
            }else

                $user = User::find($id);
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone = $request->pharmacy_phone;
                $user->mobile = $request->mobile;
                $user->u_country = $request->country;
                $user->u_city = $request->governorate;
                $user->u_governorate = $request->city;
                $user->u_address = $request->address;
                $user->password = bcrypt($request->password);
                $user->api_token = null;
                $user->save();
                $pharmacy = Pharmacy::where('user_id', '=', $user->id)->first();
                $pharmacy->pharm_name = $request->pharmacy_name;
                $pharmacy->save();
            return response(['status' => true,'message' => trans('تم تحديث المعلومات بنجاح')]);
            }
         else {
            return response(['status' => false, 'message' => 'حدث خطأ يرجى تسجيل الدحول من جديد']);

        }
    }


    public function updateclient(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->api_token == $request->token) {
            $rules = [
                'username' => 'required|string|max:255' ,
                'email' => 'required|email|max:255' ,
                'password' => 'required|string|min:6|confirmed',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'governorate' => 'required',
                'mobile' => 'required',
                'city' => 'required',
                'image' => 'required',
                'home_clinc' => 'required',
                'doc_type' => 'required',

            ];
            $messages = [
                'username.required' => "the username is required",
                'email.required' => "the email is required",
                'password.required' => "the password is required",
                'password.confirmed' => "the password must be matching",
                'phone.required' => "the phone is required",
                'mobile.required' => "the mobile is required",
                'address.required' => "the address is required",
                'country.required' => "the country is required",
                'governorate.required' => "the governor is required",
                'city.required' => "the city is required",
                'home_clinc.required' => "the home_clinic is required",
                'doc_type.required' => "the doc_type is required",
                'image.required' => "the image is required",

            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->passes()) {
                $user = User::find($id);

                if ($request['image'] != '') {
                    $file = $request->file('image');
                    $path = public_path() . '/images/profile';
                    $filename = time() . rand(11111, 00000) . '.' . $file->getClientOriginalExtension();
                    if ($file->move($path, $filename)) {
                        $user->image = $filename;
                    }
                }

                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->mobile = $request->mobile;
                $user->u_country = $request->country;
                $user->u_city = $request->governorate;
                $user->u_governorate = $request->city;
                $user->u_address = $request->address;
                $user->password = bcrypt($request->password);
                $confirmation_code = str_random(30);
                $user->confirmation_code = $confirmation_code;
                $user->client_type = $request->client_type;
                $user->save();
                $client = Client::where('user_id', '=', $user->id)->first();
                $client->home_clinc = $request->home_clinic;
                $client->doc_type = $request->doc_type;
                $client->c_fname = $request->username;
                $client->client_type = $request->client_type;
                $client->save();

                return response()->json([
                    'version' => '1.0',
                    'type' => 'success',
                ], $this->success_status);
            } else {
                foreach ((array)$validator->errors() as $error) {

                    if (isset($error['username'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['username'][0]

                        ], $this->failed_status);
                    }

                    if (isset($error['email'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['email'][0]

                        ], $this->failed_status);
                    }

                    if (isset($error['password'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['password'][0]

                        ], $this->failed_status);
                    }

                    if (isset($error['phone'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['phone'][0]
                        ], $this->failed_status);
                    }

                    if (isset($error['mobile'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['mobile'][0]
                        ], $this->failed_status);
                    }

                    if (isset($error['address'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['address'][0]
                        ], $this->failed_status);
                    }

                    if (isset($error['country'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['country'][0]
                        ], $this->failed_status);
                    }
                    if (isset($error['governorate'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['governorate'][0]
                        ], $this->failed_status);
                    }

                    if (isset($error['city'])) {
                        return response()->json([
                            'version' => '1.0',
                            'type' => 'error',
                            'message' => $error['city'][0]
                        ], $this->failed_status);
                    }
                }
            }
        } else {
            return response(['status' => false, 'message' => 'حدث خطأ يرجى تسجيل الدحول من جديد']);

        }
    }


}
