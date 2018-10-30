<?php

namespace App\Http\Controllers;

use App\ExcessMedicines;
use App\Mail\PharmacyMail;
use App\RequestExcessMedicines;
use App\RequestMedcineFirm;
use Illuminate\Http\Request;
use App\RequestOffers;
use App\User;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Rule;
use DB;
use Auth;


class PharmacyController extends Controller
{
    function __construct() {
        $this->user = new User();
    }
    public function account()
    {
        return view('back.pages.pharmacy.main');
    }

    //Account setting functions
    public function accountSetting()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $pharmacy = DB::table('pharmacys')->where('user_id', $user->id)->first();
        return view('back.pages.pharmacy.account_setting')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('user', $user)
            ->with('pharmacy', $pharmacy);
    }

    public function updatePharmacy($user_id, Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'address' => 'required|string|max:255',
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
        DB::table('pharmacys')->where('user_id', $user_id)->update(array(

            'pharm_name' => $request->name,
        ));

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    //firm offers functions
    public function firmsOffers()
    {
        $dateFormat = date('m/d/Y');
        $offers = DB::table('firms_offers')->where([['firms_offers.status', 1], ['expiry_date', '>=', $dateFormat]])
            ->join('users', 'firms_offers.firm_id', '=', 'users.id')
            ->select('firms_offers.*', 'users.paid')
            ->orderBy('users.paid', 'desc')
            ->get();
        return view('back.pages.pharmacy.firms_offers')
            ->with('offers', $offers);
    }

    public function requestFirmsOffers($id)
    {
        $offer = new RequestOffers();
        $offer->pharm_id = Auth::user()->id;
        $offer->offer_id = $id;
        $offer->save();
        $email = DB::table('firms_offers')->where('firms_offers.id', $id)
            ->join('users', 'firms_offers.firm_id', '=', 'users.id')
            ->select('users.email')
            ->first();
//        return $email->email;
//        die();

        $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('pharmacys','users.id','pharmacys.user_id')
            ->select('users.*','pharmacys.pharm_name')
            ->first();
        \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,1,null,null,null,null));
        return back()->with('success', 'تم طلب  بنجاح');
    }

    ///orders //////////////
    public function ordersMedicine()
    {
        $orders = DB::table('request_medicins')->where('pharm_id', Auth::user()->id)
            ->join('users', 'request_medicins.user_id', '=', 'users.id')
            ->select('request_medicins.*', 'users.username', 'users.mobile', 'users.email')->get();
        return view("back.pages.pharmacy.orders")->with('orders', $orders);
    }

    public function detailsOrderMedcine($order_id)
    {
        $orders = DB::table('request_medicins')->where('request_medicins.id', $order_id)
            ->join('users', 'request_medicins.user_id', '=', 'users.id')
            ->select('request_medicins.*', 'users.username', 'users.mobile', 'users.email')
            ->first();
        return view("back.pages.pharmacy.details_request_medicine")->with('orders', $orders);
    }

    public function updateStatusOrderMedcine($order_id, Request $request)
    {
//        return $request->status;
//        die();
        DB::table('request_medicins')->where('id', $order_id)->update(['requst_client_status' => $request->status]);

        $email = DB::table('request_medicins')->where('request_medicins.id', $order_id)
            ->join('users', 'request_medicins.user_id', '=', 'users.id')
            ->select('users.email')
            ->first();

        $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('pharmacys','users.id','pharmacys.user_id')
            ->select('users.*','pharmacys.pharm_name')
            ->first();
        $order_request=0;
        if($request->status== "rejected")
        {
            $order_request=2;
        }
        else{
            $order_request=1;
        }
        \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,null,null,null,null,$order_request));

        return redirect('/orders-medicines')->with('success', 'تم تعديل البيانات بنجاح');;
    }

///////////////////////////////request medicine functions///////////////
    public function requestMedicine()
    {
        $request_firm_phrma = DB::table('request_medicins_pharm_firms')->where('pharm_id', '=', Auth::user()->id)
            ->join('firm_types', 'request_medicins_pharm_firms.firm_type_id', '=', 'firm_types.id')
            ->join('deals_types', 'request_medicins_pharm_firms.deal_type_id', '=', 'deals_types.id')
            ->join('firms', 'request_medicins_pharm_firms.firm_id', '=', 'firms.user_id')
            ->select('request_medicins_pharm_firms.*', 'firm_types.title as firm_types', 'deals_types.title as deals_types', 'firms.f_name')
            ->orderBy('request_medicins_pharm_firms.id', 'desc')
            ->get();
        //  return $request_firm_phrma;
        return view('back.pages.pharmacy.request_medicine')
            ->with('request_firm_phrma', $request_firm_phrma);
    }

    public function addrequestMedicine()
    {
        $f_types = DB::table('firm_types')->get();
        $deals_types = DB::table('deals_types')->get();
        $distrubtes = DB::table('firms')->where('f_type', 3)->get();
        $medicines = DB::table('firms_medicines')->get();
        return view('back.pages.pharmacy.add_request_medicine_phmar_firm')
            ->with('f_types', $f_types)
            ->with('deals_types', $deals_types)
            ->with('distrubtes', $distrubtes)
            ->with('medicines', $medicines);
    }

    public function getMedicine(Request $request)
    {
        $data = DB::table('firms_medicines')->where('firm_id', $request->id)->get();
        return response()->json($data);
    }

    public function getMedicinePrice(Request $request)
    {
        $data = DB::table('firms_medicines')->where('id', $request->id)->first();
        return response()->json($data);
    }

    public function getFirms(Request $request)
    {

        $data = DB::table('firms')->where('f_type', $request->id)->get();
        return response()->json($data);

    }

    public function storeRequestMedicine(Request $request)
    {
//        return "welcome";
        $this->validate(request(), [
            'firm_type' => 'required',
            'deal_type' => 'required',
            'firm' => 'required',
            'details' => 'required',
            'location' => 'required'
        ]);
//        $firm_pharam = new RequestMedcineFirm();
//        $firm_pharam->firm_type_id = $request->firm_type;
//        $firm_pharam->pharm_id = Auth::user()->id;
//        $firm_pharam->firm_id = $request->firm;
//        $firm_pharam->deal_type_id = $request->deal_type;
//        $firm_pharam->distribution_id= $request->distrib;
//        $firm_pharam->expire_date=$request->expire;
//        $firm_pharam->detils = $request->details;
//        $firm_pharam->save();

        foreach ($request->medicine as $key => $value) {
            $data = array('medicine_id' => $request->medicine[$key],
                'firm_type_id' => $request->firm_type,
                'pharm_id' => Auth::user()->id,
                'firm_id' => $request->firm,
                'deal_type_id' => $request->deal_type,
                'distribution_id' => $request->distrib,
                'expire_date' => $request->expire,
                'detils' => $request->details,
                'location' => $request->location,
                'quantity' => $request->quantity[$key]);
            RequestMedcineFirm::insert($data);
        }
        $email = DB::table('users')->where('id',  $request->firm) ->first();
        $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('pharmacys','users.id','pharmacys.user_id')
            ->select('users.*','pharmacys.pharm_name')
            ->first();

        \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,null,1,null ,null ,null));
        return redirect('/pharmacy-request-medicine')->with('success', 'تم الطلب  بنجاح');
    }

    public function detailsRequestMedicinePharm($order_id)
    {
        $orders = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.id', $order_id)
            ->join('users', 'request_medicins_pharm_firms.firm_id', '=', 'users.id')
            ->join('deals_types', 'request_medicins_pharm_firms.deal_type_id', '=', 'deals_types.id')
            ->join('firms_medicines', 'request_medicins_pharm_firms.medicine_id', '=', 'firms_medicines.id')
            ->select('request_medicins_pharm_firms.*', 'users.username', 'users.mobile', 'users.email', 'deals_types.title', 'firms_medicines.medicine_name_en')
            ->first();
//        return $orders->medicine_name_en;
        return view("back.pages.pharmacy.details_request_medcinie_pharm_firm")->with('orders', $orders);
    }

    public function deleteRequestMedicinePharm($request_id)
    {

        DB::table('request_medicins_pharm_firms')->where('id', $request_id)->delete();
        return redirect('/pharmacy-request-medicine')->with('success', 'تم الحذف  بنجاح');
    }

    public function editRequestMedicinePharm($request_id)
    {
        $f_types = DB::table('firm_types')->get();
        $deals_types = DB::table('deals_types')->get();
        $distrubtes = DB::table('firms')->where('f_type', 3)->get();
        $request_firm_phrma = DB::table('request_medicins_pharm_firms')->where('id', $request_id)->first();
        $firms = DB::table('firms')->where('user_id', $request_firm_phrma->firm_id)->get();
        $price = DB::table('firms_medicines')->select('price')->where('id', $request_firm_phrma->medicine_id)->first();
        $medicines = DB::table('firms_medicines')->get();
//     return $price->price ;
//        die();
        return view('back.pages.pharmacy.update_request_medicine_pharm_firm')
            ->with('medicines', $medicines)
            ->with('request_firm_phrma', $request_firm_phrma)
            ->with('f_types', $f_types)
            ->with('deals_types', $deals_types)
            ->with('distrubtes', $distrubtes)
            ->with('price', $price)
            ->with('firms', $firms);
    }

    public function updateRequestMedicinePharm($request_id, Request $request)
    {
        $this->validate(request(), [
            'firm_type' => 'required',
            'deal_type' => 'required',
            'firm' => 'required',
            'medicine_id', 'required',
            'location', 'required',
            'deal_type_id', 'required',
            'quantity', 'required',
            'details' => 'required'
        ]);
        DB::table('request_medicins_pharm_firms')->where('id', $request_id)->update(array(
            'medicine_id' => $request->medicine,
            'firm_type_id' => $request->firm_type,
            'pharm_id' => Auth::user()->id,
            'firm_id' => $request->firm,
            'distribution_id' => $request->distrib,
            'expire_date' => $request->expire,
            'deal_type_id' => $request->deal_type,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'detils' => $request->details,
        ));
        return redirect('/pharmacy-request-medicine')->with('success', 'تم تعديل  بنجاح');
    }

/// excess Medicines//////////////////////////
    public function excessMedicines()
    {
        if (Auth::user()->paid == 1) {
            $excessMedicines = DB::table('excess_medicines')
                ->where([['excess_medicines.publisher_id', '<>', Auth::user()->id],
                    ['excess_medicines.quantity', '<>', '0']])
                ->join('pharmacys', 'excess_medicines.publisher_id', '=', 'pharmacys.user_id')
                ->join('users', 'users.id', '=', 'excess_medicines.publisher_id')->where('users.paid', '=', 1)
                ->select('excess_medicines.*', 'users.paid', 'pharmacys.pharm_name')
                ->get();


            return view('back.pages.pharmacy.excess_medicines')
                ->with('excessMedicines', $excessMedicines);
        } else {
            return redirect('/');
        }

    }

    public function requestExcessMedicines($requset_id)
    {
        if (Auth::user()->paid == 1) {

            $excessMedicines = DB::table('excess_medicines')->where('excess_medicines.id', $requset_id)
                ->join('pharmacys', 'excess_medicines.publisher_id', '=', 'pharmacys.user_id')
                ->select('excess_medicines.*', 'pharmacys.pharm_name')
                ->first();


            return view('back.pages.pharmacy.request_excess_medicines')
                ->with('excessMedicines', $excessMedicines);
        } else {
            return redirect('/');
        }

    }

    public function addRequestExcessMedicines($requset_id, Request $request)
    {
        if (Auth::user()->paid == 1) {

            $excessMedicines = DB::table('excess_medicines')->where('excess_medicines.id', $requset_id)
                ->join('pharmacys', 'excess_medicines.publisher_id', '=', 'pharmacys.user_id')
                ->select('excess_medicines.*', 'pharmacys.pharm_name')
                ->first();
            $this->validate(request(), [

                'quantity' => 'required'
            ]);
            if ($excessMedicines->quantity >= $request->quantity) {
                $requester = new RequestExcessMedicines();
                $requester->excess_medicines_id = $excessMedicines->id;
                $requester->requester_id = Auth::user()->id;
                $requester->required_quantity = $request->quantity;
                $requester->save();

                $quantity = $excessMedicines->quantity - $request->quantity;
                DB::table('excess_medicines')->where('id', $requset_id)->update(array(
                    'quantity' => $quantity
                ));

                $email = DB::table('users')->where('id',  $excessMedicines->publisher_id) ->first();

                $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
                    ->join('pharmacys','users.id','pharmacys.user_id')
                    ->select('users.*','pharmacys.pharm_name')
                    ->first();

                \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,null,1,null ,null ,null ));

                return redirect('/excess-medicines')->with('success', 'تم الطلب  بنجاح');
            } else {
                return redirect()->back()->with('excessMedicines', $excessMedicines)->with('errors', 'العدد لن يسمح');
            }

        } else {
            return redirect('/');
        }


    }

//surplus medicines functions

    public function surplusMedicines()
    {
        if (Auth::user()->paid == 1) {
            $excessMedicines = DB::table('excess_medicines')->where('publisher_id', Auth::user()->id)->get();

            return view('back.pages.pharmacy.surplus_medicines')->with('excessMedicines', $excessMedicines);
        } else {
            return redirect('/');
        }

    }


    public function addSurplusMedicines()
    {
        if (Auth::user()->paid == 1) {
            return view('back.pages.pharmacy.add_surplus_medicines');
        } else {
            return redirect('/');
        }


    }


    public function storeSurplusMedicines(Request $request)
    {
        if (Auth::user()->paid == 1) {
            $this->validate(request(), [
                'medicine_name' => 'required',
                'quantity' => 'required|integer'
            ]);
            $surplus_medicine = new ExcessMedicines();
            $surplus_medicine->publisher_id = Auth::user()->id;
            $surplus_medicine->medicine_name = $request->medicine_name;
            $surplus_medicine->quantity = $request->quantity;
            $surplus_medicine->save();

            return redirect('/surplus-medicines')->with('success', 'تم اضافة  بنجاح');
        } else {
            return redirect('/');
        }


    }


    public function editSurplusMedicines($surplus_id)
    {
        if (Auth::user()->paid == 1) {
            $surplus = DB::table('excess_medicines')->where('id', $surplus_id)->first();
            return view('back.pages.pharmacy.add_surplus_medicines')->with('surplus', $surplus);
        } else {
            return redirect('/');
        }

    }


    public function updateSurplusMedicines($surplus_id, Request $request)
    {
        if (Auth::user()->paid == 1) {
            $this->validate(request(), [
                'medicine_name' => 'required',
                'quantity' => 'required'
            ]);
            DB::table('excess_medicines')->where('id', $surplus_id)->update(array(
                'medicine_name' => $request->medicine_name,
                'quantity' => $request->quantity
            ));
            return redirect('/surplus-medicines')->with('success', 'تم تعديل  بنجاح');
        } else {
            return redirect('/');
        }

    }


    public function deleteSurplusMedicines($surplus_id)
    {
        if (Auth::user()->paid == 1) {
            DB::table('excess_medicines')->where('id', $surplus_id)->delete();
            return redirect()->back()->with('success', 'تم حذف  بنجاح');
        } else {
            return redirect('/');
        }

    }

///*******17-4 HW********////////////
    public function requestSurplusMedicines()
    {
        if (Auth::user()->paid == 1) {
            $excess_medicines = DB::table('excess_medicines')->where('publisher_id', Auth::user()->id)->first();
            $request_medicines = DB::table('request_excess_medicines')->where('excess_medicines_id', $excess_medicines->id)
                ->join('users', 'request_excess_medicines.requester_id', '=', 'users.id')
                ->join('pharmacys', 'request_excess_medicines.requester_id', '=', 'pharmacys.user_id')
                ->select('request_excess_medicines.*', 'users.username', 'users.username', 'users.mobile', 'users.email', 'users.u_address', 'pharmacys.pharm_name')
                ->get();
            return view('back.pages.pharmacy.orders_excess_medicine')->with('request_medicines', $request_medicines);
        } else {
            return redirect('/');
        }

    }

// ********** 18-4 *************/////
    Public function acceptRequestSurplusMedicines($excess)
    {
        DB::table('request_excess_medicines')->where('id', $excess)
            ->update(['status' => 'accept']);

        $email = DB::table('request_excess_medicines')->where('request_excess_medicines.id',  $excess)
            ->join('users','request_excess_medicines.requester_id','=','users.id')
            ->first();

        $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('pharmacys','users.id','pharmacys.user_id')
            ->select('users.*','pharmacys.pharm_name')
            ->first();

//        return $email->email;
//        die();
        \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,null,null,1 ,null ,null));

        return redirect('/request-surplus-medicines')->with('success', 'تم قبول الطلب');
    }

    Public function rejectRequestSurplusMedicines($excess)
    {
        $excess_id = DB::table('request_excess_medicines')->where('id', $excess)->first();
        $quantity = DB::table('excess_medicines')->where('id', $excess_id->excess_medicines_id)->first();
        $total = $excess_id->required_quantity + $quantity->quantity;
        DB::table('excess_medicines')->where('id', $quantity->id)
            ->update(['quantity' => $total]);
        DB::table('request_excess_medicines')->where('id', $excess)
            ->update(['status' => 'reject']);

        $email = DB::table('request_excess_medicines')->where('request_excess_medicines.id',  $excess)
            ->join('users','request_excess_medicines.requester_id','=','users.id')
            ->first();

        $pharmacy=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('pharmacys','users.id','pharmacys.user_id')
            ->select('users.*','pharmacys.pharm_name')
            ->first();

        \Mail::to($email->email)->send(new PharmacyMail($pharmacy->email, $pharmacy->username ,$pharmacy->pharm_name,null,null,null ,1,null ));


        return redirect('/request-surplus-medicines')->with('success', 'تم رفض الطلب');
    }
///////************************///////
}
