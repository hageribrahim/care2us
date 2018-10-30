<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firms_offer;
use App\Firms_medicine;
use App\Cure2usoffer;
use Illuminate\Support\Facades\Mail;
use App\Statistics;
use App\Mail\FirmMails;
use DB;
use Auth;

class FirmController extends Controller
{
    public function account()
    {
        return view('back.pages.firm.main');
    }

//Account setting functions
    public function accountSetting()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $firm = DB::table('firms')->where('user_id', $user->id)->first();
        $firm_types = DB::table('firm_types')->get();
        return view('back.pages.firm.account_setting')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('user', $user)
            ->with('firm', $firm)
            ->with('firm_types', $firm_types);
    }

    public function updateFirm($user_id, Request $request)
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
        DB::table('firms')->where('user_id', $user_id)->update(array(

            'f_name' => $request->name,
            'f_type' => $request->firm_type,
        ));

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

//////////////////////////firm offers//////////////////////

    public function firmOffers()
    {
        $offers = DB::table('firms_offers')->where('firm_id', Auth::user()->id)->where('status', 1)->get();
        return view('back.pages.firm.firm_offers')
            ->with('offers', $offers);
    }

    public function addFirmOffer()
    {

        return view('back.pages.firm.add_firm_offer');
    }

    public function storeFirmOffer(Request $request)
    {
        $this->validate(request(), [
            'offer_name' => 'required|string|max:60',
            'medicine_name' => 'required|string|max:60',
            'offer_desc' => 'required|string',
        ]);
        $firm_name = DB::table('firms')->where('user_id', Auth::user()->id)->first(['f_name']);

        $firm_offer = new Firms_offer();

        $firm_offer->firm_id = Auth::user()->id;
        $firm_offer->firm_name = $firm_name->f_name;
        $firm_offer->offer_name = $request->offer_name;
        $firm_offer->medicine_name = $request->medicine_name;
        $firm_offer->offer_desc = $request->offer_desc;
        $firm_offer->status = 1;
        $firm_offer->expiry_date = $request->expiry_date;

        $firm_offer->save();
        return redirect('/firm-offers')->with('success', 'تم اضافة العرض بنجاح');
    }

    public function modifyFirmOffer($offer_id)
    {
        $offer = DB::table('firms_offers')->where('id', $offer_id)->first();
        return view('back.pages.firm.add_firm_offer')->with('offer', $offer);
    }

    public function updateFirmOffer(Request $request)
    {
        $this->validate(request(), [
            'offer_name' => 'required|string|max:60',
            'medicine_name' => 'required|string|max:60',
            'offer_desc' => 'required|string',
        ]);
        DB::table('firms_offers')->where('id', $request->offer_id)
            ->update(['firm_id' => Auth::user()->id,
                'offer_name' => $request->offer_name,
                'medicine_name' => $request->medicine_name,
                'offer_desc' => $request->offer_desc,
                'status' => 1,
                'expiry_date' => $request->expiry_date]);

        return redirect('/firm-offers')->with('success', 'تم تعديل العرض بنجاح');
    }

    public function deleteFirmOffer($offer_id)
    {
        DB::table('firms_offers')->where('id', '=', $offer_id)->delete();
        return redirect('/firm-offers')->with('success', 'تم الحذف  بنجاح');
    }

    public function orderFirmOffer()
    {
        $orders=DB::table('firms_offers')->where('firm_id',Auth::user()->id)
            ->join('request_offers','firms_offers.id','=','request_offers.offer_id')
            ->join('users','request_offers.pharm_id','=','users.id')
            ->join('pharmacys','request_offers.pharm_id','=','pharmacys.user_id')
            ->select('firms_offers.offer_name','request_offers.*','users.email','users.username','users.mobile','pharmacys.pharm_name')
            ->get();

//        return $orders;
        return view('back.pages.firm.order_firm_offer')->with('orders',$orders);
    }

    public function acceptOfferOrder ($id)
    {
        DB::table('request_offers')->where('id', $id)
            ->update(['status' => 'accept']);

        $email = DB::table('request_offers')->where('request_offers.id', $id)
            ->join('users', 'request_offers.pharm_id', '=', 'users.id')
            ->select('users.email')
            ->first();
//        return $email->email;
//        die();

        $firm=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('firms','users.id','firms.user_id')
            ->select('users.*','firms.f_name')
            ->first();

        \Mail::to($email->email)->send(new FirmMails($firm->email, $firm->username ,$firm->f_name,1,null,null,null));
        return redirect('/orders-offer')->with('success', 'تم قبول الطلب');
    }

    public function rejectOfferOrder ($id)
    {
        DB::table('request_offers')->where('id', $id)
            ->update(['status' => 'reject']);

        $email = DB::table('request_offers')->where('request_offers.id', $id)
            ->join('users', 'request_offers.pharm_id', '=', 'users.id')
            ->select('users.email')
            ->first();
//        return $email->email;
//        die();

        $firm=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('firms','users.id','firms.user_id')
            ->select('users.*','firms.f_name')
            ->first();

        \Mail::to($email->email)->send(new FirmMails($firm->email, $firm->username ,$firm->f_name,null,1,null,null));

        return redirect('/orders-offer')->with('success', 'تم رفض الطلب');
    }

////////////////////////////////////firm Medicines///////////////////////////

    public function firmMedicines()
    {
        $medicines = DB::table('firms_medicines')->where('firm_id', Auth::user()->id)->get();
        $medicine_types = DB::table('medicines_types')->get();
        return view('back.pages.firm.firm_medicines')
            ->with('medicines', $medicines)
            ->with('medicine_types', $medicine_types);
    }

    public function addFirmMedicine()
    {
        $medicine_types = DB::table('medicines_types')->get();
        return view('back.pages.firm.add_firm_medicines')
            ->with('medicine_types', $medicine_types);
    }

    public function storeFirmMedicine(Request $request)
    {
        $this->validate(request(), [
            'medicine_name_en' => 'required|string|max:60',
            'medicine_name_ar' => 'string|max:60',
            'active_substance' => 'string|max:60',
            'active_substance_en' => 'string|max:60',
            'medicine_name_ar' => 'string|max:60',
            'price' => 'string|max:60',
            'discount' => 'string|max:60',
        ]);
        $firm_medicine = new Firms_medicine();

        $firm_medicine->firm_id = Auth::user()->id;
        $firm_medicine->medicine_name_en = $request->medicine_name_en;
        $firm_medicine->medicine_name_ar = $request->medicine_name_ar;
        $firm_medicine->medicine_type = $request->medicine_type;
        $firm_medicine->active_substance = $request->active_substance;
        $firm_medicine->active_substance_en = $request->active_substance_en;
        $firm_medicine->active_substance_ar = $request->active_substance_ar;
        $firm_medicine->price = $request->price;
        $firm_medicine->discount = $request->discount;
        if ($request->medicine_img != '') {
            $medicine_img = time() . '.' . $request->medicine_img->getClientOriginalExtension();
            $firm_medicine->medicine_img = $medicine_img;
            $request->medicine_img->move(public_path('images/medicines'), $medicine_img);
        }
        if ($request->prescription_img_en != '') {
            $prescription_img_en = time() . '.' . $request->prescription_img_en->getClientOriginalExtension();
            $firm_medicine->prescription_img_en = $prescription_img_en;
            $request->prescription_img_en->move(public_path('images/medicines'), $prescription_img_en);
        }
        if ($request->prescription_img_ar != '') {
            $prescription_img_ar = time() . '.' . $request->prescription_img_ar->getClientOriginalExtension();
            $firm_medicine->prescription_img_ar = $prescription_img_ar;
            $request->prescription_img_ar->move(public_path('images/medicines'), $prescription_img_ar);
        }
        $firm_medicine->save();
        return redirect('/firm-medicines')->with('success', 'تم اضافة الدواء بنجاح');

    }

    public function deleteFirmMedicine($medicines_id)
    {
        DB::table('firms_medicines')->where('id', '=', $medicines_id)->delete();
        return redirect('/firm-medicines')->with('success', 'تم الحذف  بنجاح');
    }

    public function editFirmMedicine($medicines_id)
    {
        $medicine_types = DB::table('medicines_types')->get();
        $medicines = DB::table('firms_medicines')->where('id', $medicines_id)->first();
        return view('back.pages.firm.add_firm_medicines')->with('medicines', $medicines)->with('medicine_types', $medicine_types);
    }

    public function updateFirmMedicine($medicines_id, Request $request)
    {
        $this->validate(request(), [
            'medicine_name_en' => 'required|string|max:60',
            'medicine_name_ar' => 'string|max:60',
            'active_substance' => 'string|max:60',
            'active_substance_en' => 'string|max:60',
            'medicine_name_ar' => 'string|max:60',
            'price' => 'string|max:60',
            'discount' => 'string|max:60',
        ]);

        $firms_medicines = DB::table('firms_medicines')->select('medicine_img', 'prescription_img_en', 'prescription_img_ar')->where('id', $medicines_id)->first();

        $medicine_img = $firms_medicines->medicine_img;
        if ($request->medicine_img != '') {
            $medicine_img = time() . '.' . $request->medicine_img->getClientOriginalExtension();
            $request->medicine_img->move(public_path('images/medicines'), $medicine_img);
        }
        $prescription_img_en = $firms_medicines->prescription_img_en;
        if ($request->prescription_img_en != '') {
            $prescription_img_en = time() . '.' . $request->prescription_img_en->getClientOriginalExtension();
            $request->prescription_img_en->move(public_path('images/medicines'), $prescription_img_en);
        }
        $prescription_img_ar = $firms_medicines->prescription_img_ar;
        if ($request->prescription_img_ar != '') {
            $prescription_img_ar = time() . '.' . $request->prescription_img_ar->getClientOriginalExtension();
            $request->prescription_img_ar->move(public_path('images/medicines'), $prescription_img_ar);
        }

        DB::table('firms_medicines')->where('id', $medicines_id)
            ->update(['firm_id' => Auth::user()->id,
                'medicine_name_en' => $request->medicine_name_en,
                'medicine_name_ar' => $request->medicine_name_ar,
                'medicine_type' => $request->medicine_type,
                'active_substance' => $request->active_substance,
                'active_substance_en' => $request->active_substance_en,
                'active_substance_ar' => $request->active_substance_ar,
                'price' => $request->price,
                'discount' => $request->discount,
                'medicine_img' => $medicine_img,
                'prescription_img_en' => $prescription_img_en,
                'prescription_img_ar' => $prescription_img_ar]);
        return redirect('/firm-medicines')->with('success', 'تم تعديل الدواء بنجاح');
    }

    public function detailsFirmMedicine($medicines_id)
    {

        $medicines_details = DB::table('firms_medicines')->where('id', $medicines_id)->first();
        $medicines_type = DB::table('medicines_types')->select('title')->where('id', $medicines_details->medicine_type)->first();
        return view('back.pages.firm.medicine_details')->with('medicines_details', $medicines_details)
            ->with('medicines_type', $medicines_type);
    }

///////////////////////////////////////////////////////////////////////////////////////


/////// Request Medicine from Pharmacy//////////

    public function requestMedicinePharm()
    {
        //$firm_id = DB::table('firms')->where('user_id', Auth::user()->id)->first();
        $request_firm_phrma = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.firm_id', Auth::user()->id)
            ->join('users', 'request_medicins_pharm_firms.pharm_id', '=', 'users.id')
            ->join('pharmacys', 'request_medicins_pharm_firms.pharm_id', '=', 'pharmacys.user_id')
            ->join('deals_types', 'request_medicins_pharm_firms.deal_type_id', 'deals_types.id')
            ->join('firms_medicines','request_medicins_pharm_firms.medicine_id','=','firms_medicines.id')
            ->select('request_medicins_pharm_firms.*', 'users.username', 'users.mobile', 'users.email', 'users.u_address', 'pharmacys.pharm_name', 'deals_types.title','firms_medicines.medicine_name_en')
            ->orderBy('request_medicins_pharm_firms.id', 'desc')
            ->get();
        return view('back.pages.firm.request_medicine_pharma')->with('request_firm_phrma', $request_firm_phrma);
    }

    public function detailsRequestMedicinePharm($order_id)
    {
        $orders = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.id', $order_id)
            ->join('users', 'request_medicins_pharm_firms.pharm_id', '=', 'users.id')
            ->join('pharmacys', 'request_medicins_pharm_firms.pharm_id','=','pharmacys.user_id')
            ->join('deals_types','request_medicins_pharm_firms.deal_type_id','=','deals_types.id')
            ->join('firms_medicines','request_medicins_pharm_firms.medicine_id','=','firms_medicines.id')
            ->select('request_medicins_pharm_firms.*', 'users.username', 'users.mobile', 'users.email','deals_types.title','firms_medicines.medicine_name_en','pharmacys.pharm_name')
            ->first();
//        return $orders->medicine_name_en;
        return view("back.pages.firm.details_request_medicine_pharm_firm")->with('orders', $orders);
    }

    Public function acceptRequestMedicinePharm($request_id)
    {
        DB::table('request_medicins_pharm_firms')->where('id', $request_id)
            ->update(['requst_pharm_status' => 'accept']);

        $email = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.id', $request_id)
            ->join('users', 'request_medicins_pharm_firms.pharm_id', '=', 'users.id')
            ->select('users.email')
            ->first();
//        return $email->email;
//        die();

        $firm=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('firms','users.id','firms.user_id')
            ->select('users.*','firms.f_name')
            ->first();

        \Mail::to($email->email)->send(new FirmMails($firm->email, $firm->username ,$firm->f_name,null,null,1,null));

        return redirect('/request-medicine-pharm')->with('success', 'تم قبول الطلب');
    }

    Public function rejectRequestMedicinePharm($request_id)
    {
        DB::table('request_medicins_pharm_firms')->where('id', $request_id)
            ->update(['requst_pharm_status' => 'reject']);

        $email = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.id', $request_id)
            ->join('users', 'request_medicins_pharm_firms.pharm_id', '=', 'users.id')
            ->select('users.email')
            ->first();
//        return $email->email;
//        die();

        $firm=DB::table('users')->where('users.id',Auth::user()->id)
            ->join('firms','users.id','firms.user_id')
            ->select('users.*','firms.f_name')
            ->first();

        \Mail::to($email->email)->send(new FirmMails($firm->email, $firm->username ,$firm->f_name,null,null,null,1));

        return redirect('/request-medicine-pharm')->with('success', 'تم رفض الطلب');
    }

    //////////Cure2us offer/////////////////
    public function addCure2usOffer()
    {
        return view('back.pages.firm.add_cure2us_offer');
    }

    public function storeCure2usOffer(Request $request)
    {
        $this->validate(request(), [
            'expire_date' => 'required',
            'description' => 'required'
        ]);
        $offer = new Cure2usoffer();
        $offer->user_id = Auth::user()->id;
        $offer->expire_data = $request->expire_date;
        $offer->description = $request->description;
        $offer->save();
        return redirect('/your-cure2us-offer')->with('success', 'تم اضافة العرض');
    }

    public function getCure2usoffer()
    {
        $offers = DB::table('cure2us_offer')->where('user_id', Auth::user()->id)->get();
        return view('back.pages.firm.cure2us_offer')->with('offers', $offers);
    }

    public function deleteCure2usoffer($id)
    {
        //  return 'hi';
        DB::table('cure2us_offer')->where('id', $id)->delete();
        return redirect('/your-cure2us-offer')->with('success', 'تم حذف العرض');
    }

    public function editCure2usoffer($id)
    {
        $offer = DB::table('cure2us_offer')->where('id', $id)->first();
        return view('back.pages.firm.add_cure2us_offer')->with('offer', $offer);
    }

    public function updateCure2usoffer($id, Request $request)
    {
        $this->validate(request(), [
            'expire_date' => 'required',
            'description' => 'required'
        ]);

        DB::table('cure2us_offer')->where('id', $id)->update([
            'expire_data' => $request->expire_date,
            'description' => $request->description
        ]);
        return redirect('/your-cure2us-offer')->with('success', 'تم تعديل العرض');
    }

    /////////////Statistics //////////////////

    public function previewStatistics()
    {

        $medicines = DB::table('statistics')
            ->join('firms_medicines', 'statistics.medicine_id', '=', 'firms_medicines.id')
            ->select('statistics.*', 'firms_medicines.medicine_name_en')
            ->get();
        return view('back.pages.firm.preview_statistics')->with('medicines', $medicines);
    }

    public function addStatistics()
    {
        $medicines = DB::table('firms_medicines')->where('firm_id', Auth::user()->id)->get();
        return view('back.pages.firm.add_statistics')->with('medicines', $medicines);
    }

    public function storeStatistics(Request $request)
    {
        $this->validate(request(), [
            'medicine_name' => 'required',
            'quantity_sold' => 'required'
        ]);
        $statistics = new Statistics();
        $statistics->medicine_id = $request->medicine_name;
        $statistics->quantity_sold = $request->quantity_sold;
        $statistics->firm_id = Auth::user()->id;
        $statistics->save();
        return redirect('/preview-statistics')->with('success', 'تم اضافة ');
    }

    public function deleteStatistics($id)
    {
        DB::table('statistics')->where('id', $id)->delete();
        return redirect('/preview-statistics')->with('success', 'تم الحذف ');

    }

    public function editStatistics($id)
    {
        $medicines = DB::table('firms_medicines')->where('firm_id', Auth::user()->id)->get();
        $statistics =DB::table('statistics')->where('id', $id)->first();
         return view('back.pages.firm.add_statistics')
             ->with('medicines', $medicines)
             ->with('statistics', $statistics);
    }

    public function updateStatistics($id , Request $request)
    {
        $this->validate(request(), [
            'medicine_name' => 'required',
            'quantity_sold' => 'required'
        ]);

        DB::table('statistics')->where('id',$id)->update([
            'medicine_id'=> $request->medicine_name,
            'quantity_sold'=>$request->quantity_sold,
        ]);
        return redirect('/preview-statistics')->with('success', 'تم تعديل ');
    }

    public function compareStatistics($id)
    {
        $medicines=DB::table('statistics')
            ->join('firms_medicines','statistics.medicine_id','=','firms_medicines.id')
            ->join('firms','statistics.firm_id','=','firms.user_id')
            ->select('firms_medicines.medicine_name_en','firms.f_name','statistics.*')
            ->get();
        $medicine= DB::table('statistics')->where('statistics.id',$id)
            ->join('firms_medicines','statistics.medicine_id','=','firms_medicines.id')
            ->join('firms','statistics.firm_id','=','firms.user_id')
            ->select('firms_medicines.medicine_name_en','firms.f_name','statistics.*')
            ->first();
        return view('back.pages.firm.statistics')->with('medicines',$medicines)->with('medicine',$medicine);

    }

    public function getPrecentage (Request $request)
    {
        $data=DB::table('statistics')->where('statistics.id', $request->id)
            ->join('firms_medicines','statistics.medicine_id','=','firms_medicines.id')
            ->select('firms_medicines.medicine_name_en','statistics.*')
            ->first();
       // return $data;
        return response()->json($data);
    }
}
