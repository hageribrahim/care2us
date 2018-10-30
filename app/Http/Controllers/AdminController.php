<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdminModel;
use App\MedicineReactives;
use App\TreatmentAbroad;
use App\DrugsFoods;
use App\Category;
use App\CommonDiseases;
use App\VeterinaryMedicine;
use App\Subject;
use App\Videos;
use DB;
use Auth;

class AdminController extends Controller
{

    public function account()
    {
        return view('back.pages.admin.main');
    }

    public function getAdmins()
    {
        $admins = DB::table('admins')->where('id', '!=', Auth::guard('admin')->user()->id)->orderBy('status', 'desc')->get();
        return view('back.pages.admin.admins')->with('admins', $admins);
    }

    public function adminRegister()
    {
        return view('back.pages.admin.add_admin');
    }

    public function storeAdmin(Request $request)
    {

        $this->validate(request(), [
            'username' => 'required|string|max:255|unique:admin',
            'email' => 'required|email|max:255|unique:admin',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = new AdminModel;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->status = 1;
        $admin->password = bcrypt($request->password);
        if ($request->website_admin != null) {
            $admin->websites_admin = 1;
        }
        if ($request->ads_admin != null) {
            $admin->ads_admin = 1;
        }
        if ($request->superadmin != null) {
            $admin->super_admin = 1;
            $admin->ads_admin = 1;
            $admin->websites_admin = 1;
        }
        $admin->save();
        return redirect('/admins')->with('success', 'تم اضافة الادمن');
    }

    public function updateAdmin($admin_id)
    {
        $admins = DB::table('admin')->where('id', $admin_id)->first();
        return view('back.pages.admin.add_admin')->with('admins', $admins);
    }

    public function editAdmin($admin_id, Request $request)
    {
        $websites_admin = 0;
        $ads_admin = 0;
        $superadmin = 0;
        if ($request->website_admin != null) {
            $websites_admin = 1;
        }
        if ($request->ads_admin != null) {
            $ads_admin = 1;
        }
        if ($request->superadmin != null) {
            $superadmin = 1;
            $ads_admin = 1;
            $websites_admin = 1;
        }
        DB::table('admin')->where('id', $admin_id)->update(array(
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'websites_admin' => $websites_admin,
            'ads_admin' => $ads_admin,
            'super_admin' => $superadmin,
        ));
        return redirect('/admins')->with('success', 'تم تعديل بنجاح');
    }

    public function deactivateAdmin($admin_id)
    {
        DB::table('admin')->where('id', $admin_id)->update(array(
            'status' => 0));
        return redirect('/admins')->with('success', 'تم تعديل بنجاح');
    }

    public function activateAdmin($admin_id)
    {
        DB::table('admin')->where('id', $admin_id)->update(array(
            'status' => 1));
        return redirect('/admins')->with('success', 'تم تعديل بنجاح');
    }

    ////////////Drugs Reaction///////////////
    public function getDrugsReaction()
    {
        $Reactives = DB::table('medicin_reactives')
            ->join('admins', 'medicin_reactives.admin_id', '=', 'admins.id')
            ->select('medicin_reactives.*', 'admins.username')
            ->orderBy('medicin_reactives.id', 'desc')->get();
        return view('back.pages.admin.drugs_reaction')->with('Reactives', $Reactives);
    }

    public function addDrugsReaction()
    {
        return view('back.pages.admin.add_drugs_reaction');
    }

    public function storeDrugsReaction(Request $request)
    {
        $this->validate(request(), [
            'medicen' => 'required',
            'reactives.*' => 'required',
            'results.*' => 'required'
        ]);
        foreach ($request->reactives as $key => $value) {
            $data = array('medicen' => $request->medicen,
                'admin_id' => Auth::guard('admin')->user()->id,
                'reactive' => $request->reactives[$key],
                'result' => $request->results[$key]);
            MedicineReactives::insert($data);
        }
        return redirect('/drug-reaction')->with('success', 'تم الاضافة التفاعل');
    }

    public function updateMedcineReactive($reactive_id)
    {
        $reactive = DB::table('medicin_reactives')->where('id', $reactive_id)->first();
        return view('back.pages.admin.update_drugs_reaction')->with('reactive', $reactive);
    }

    public function editMedcineReactive($reactive_id, Request $request)
    {
        $this->validate(request(), [
            'medicen' => 'required',
            'reactive' => 'required',
            'result' => 'required',
        ]);
        DB::table('medicin_reactives')->where('id', $reactive_id)->update(array(
            'medicen' => $request->medicen,
            'reactive' => $request->reactive,
            'result' => $request->result,
        ));
        return redirect('/drug-reaction')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteMedcineReactive($reactive_id)
    {
        DB::table('medicin_reactives')->where('id', $reactive_id)->delete();
        return redirect('/drug-reaction')->with('success', 'تم حذف بنجاح ');
    }

    //////////////////////////////////////////////////////////
    /////////// Drugs Foods Reaction ////////////
    public function getDrugsFoods()
    {
        $Reactives = DB::table('drugs_foods')
            ->join('admins', 'drugs_foods.admin_id', '=', 'admins.id')
            ->select('drugs_foods.*', 'admins.username')
            ->orderBy('drugs_foods.id', 'desc')->get();
        return view('back.pages.admin.drugs_foods')->with('Reactives', $Reactives);
    }

    public function addDrugsFoods()
    {
        return view('back.pages.admin.add_drugs_food');
    }

    public function storeDrugsFoods(Request $request)
    {
        $this->validate(request(), [
            'medcine' => 'required',
            'foods.*' => 'required',
            'results.*' => 'required'
        ]);
        foreach ($request->foods as $key => $value) {
            $data = array('medcine' => $request->medcine,
                'admin_id' => Auth::guard('admin')->user()->id,
                'food' => $request->foods[$key],
                'result' => $request->results[$key]);
            DrugsFoods::insert($data);
        }
        return redirect('/drug-food-reaction')->with('success', 'تم الاضافة التفاعل');
    }

    public function updateDrugsFoods($reactive_id)
    {
        $reactive = DB::table('drugs_foods')->where('id', $reactive_id)->first();
        return view('back.pages.admin.update_drugs_foods')->with('reactive', $reactive);
    }

    public function editDrugsFoods($reactive_id, Request $request)
    {
        $this->validate(request(), [
            'medcine' => 'required',
            'food' => 'required',
            'result' => 'required',
        ]);
        DB::table('drugs_foods')->where('id', $reactive_id)->update(array(
            'medcine' => $request->medcine,
            'food' => $request->food,
            'result' => $request->result,
        ));
        return redirect('/drug-food-reaction')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteDrugsFoods($reactive_id)
    {
        DB::table('drugs_foods')->where('id', $reactive_id)->delete();
        return redirect('/drug-food-reaction')->with('success', 'تم حذف بنجاح ');
    }

    ////////// categories/////////////////
    public function getCategory()
    {
        $categories = DB::table('category')
            ->join('admins', 'category.admin_id', '=', 'admins.id')
            ->select('category.*', 'admins.username')
            ->orderBy('category.id', 'desc')->get();
        return view('back.pages.admin.catrgories')->with('categories', $categories);
    }

    public function addCategory()
    {
        return view('back.pages.admin.add_category');
    }

    public function storeCategory(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:category',
            'type' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->type = $request->type;
        $category->admin_id = Auth::guard('admin')->user()->id;
        $category->save();
        return redirect('/categories')->with('success', 'تم اضافة الفئة');
    }

    public function deleteCategory($id)
    {
        DB::table('category')->where('id', $id)->delete();
        return redirect('/categories')->with('success', 'تم حذف بنجاح ');
    }

    public function updateCategory($id)
    {
        $category = DB::table('category')->where('id', $id)->first();
        return view('back.pages.admin.add_category')->with('category', $category);
    }

    public function editCategory($id, Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
            'type' => 'required',
        ]);
        DB::table('category')->where('id', $id)->update(array(
            'name' => $request->name,
            'type' => $request->type
        ));
        return redirect('/categories')->with('success', 'تم تعديل بنجاح');
    }

    //////////// Common Diseases ///////
    public function getCommonDiseases()
    {
        $subjects = DB::table('category')->where('type', 'commondiseases')
            ->join('subject', 'category.id', '=', 'subject.category_id')
            ->select('subject.*', 'category.name')->get();
        return view('back.pages.admin.common_diseases')->with('subjects', $subjects);
    }

    public function addCommonDisease()
    {
        $categories = DB::table('category')->where('type', 'commondiseases')->get();
        return view('back.pages.admin.add_common_disease')->with('categories', $categories);
    }

    public function storeCommonDisease(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category' => 'required',
            'questions.*' => 'required',
            'answers.*' => 'required'
        ]);
        $subject = new Subject();
        $subject->title = $request->title;
        $subject->category_id = $request->category;
        if ($request->image != '') {
            $img = time() . '.' . $request->image->getClientOriginalExtension();
            $subject->image = $img;
            $request->image->move(public_path('images/medicines'), $img);
        }
        if ($subject->save()) {

            foreach ($request->questions as $key => $value) {
                $data = array(
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'title_id' => $subject->id,
                    'question' => $request->questions[$key],
                    'answer' => $request->answers[$key]);
                CommonDiseases::insert($data);
            }
            return redirect('/common-dieases')->with('success', 'تم الاضافة الاسئلة');
        }

    }

    public function updateSubject($id)
    {

        $subjectDisease = DB::table('subject')->where('id', $id)->first();
        $categories = DB::table('category')->where('type', 'commondiseases')->get();
        return view('back.pages.admin.update_subject')
            ->with('subjectDisease', $subjectDisease)
            ->with('categories', $categories);
    }

    public function editSubject($id, Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category' => 'required',
        ]);
        if ($request->image == '') {
            $image = DB::table('subject')->select('image')->where('id', $id)->first();
            $img = $image->image;
        } else {
            $img = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/medicines'), $img);
        }

        DB::table('subject')->where('id', $id)->update(array(
            'title' => $request->title,
            'category_id' => $request->category,
            'image' => $img
        ));
        return redirect('/common-dieases')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteSubject($id)
    {
        DB::table('subject')->where('id', $id)->delete();
        DB::table('common_diseases')->where('title_id', $id)->delete();
        return redirect('/common-dieases')->with('success', 'تم حذف بنجاح ');
    }

    public function detailsSubject($id)
    {
        $details = DB::table('common_diseases')->where('title_id', $id)->get();
        $subject = DB::table('subject')->where('id', $id)->first();
        return view('back.pages.admin.common_disease_details')->with('details', $details)->with('subject', $subject);
    }

    public function addQuestionDisease($id)
    {
        return view('back.pages.admin.add_question_disease')->with('id', $id);
    }

    public function storeQuestionDisease($id, Request $request)
    {
        $this->validate(request(), [
            'questions.*' => 'required',
            'answers.*' => 'required'
        ]);
        foreach ($request->questions as $key => $value) {
            $data = array(
                'admin_id' => Auth::guard('admin')->user()->id,
                'title_id' => $id,
                'question' => $request->questions[$key],
                'answer' => $request->answers[$key]);
            CommonDiseases::insert($data);
        }
        return redirect('/details-subject/' . $id)->with('success', 'تم الاضافة التفاعل');
    }

    public function deleteDisease($id, Request $request)
    {
        DB::table('common_diseases')->where('id', $id)->delete();
        return redirect('/details-subject/' . $request->subject)->with('success', 'تم حذف بنجاح ');
    }

    public function updatDisease($id)
    {
        $disease = DB::table('common_diseases')->where('id', $id)->first();
        return view('back.pages.admin.update_question')->with('disease', $disease);
    }

    public function editDisease($id, Request $request)
    {
        $this->validate(request(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        $disease = DB::table('common_diseases')->select('title_id')->where('id', $id)->first();
        DB::table('common_diseases')->where('id', $id)->update(array(
            'question' => $request->question,
            'answer' => $request->answer,
        ));
        return redirect('/details-subject/' . $disease->title_id)->with('success', 'تم تعديل بنجاح');
    }

    /////////// Veterinary Medicine ////////////
    public function getVeterinaryMedicine()
    {
        $subjects = DB::table('category')->where('type', 'veterinarymedicine')
            ->join('subject', 'category.id', '=', 'subject.category_id')
            ->select('subject.*', 'category.name')->get();
        return view('back.pages.admin.veterinary_medicine')->with('subjects', $subjects);
    }

    public function addVeterinaryMedicine()
    {
        $categories = DB::table('category')->where('type', 'veterinarymedicine')->get();
        return view('back.pages.admin.add_veterinary_medicine')->with('categories', $categories);
    }

    public function storeVeterinaryMedicine(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category' => 'required',
            'questions.*' => 'required',
            'answers.*' => 'required'
        ]);
        $subject = new Subject();
        $subject->title = $request->title;
        $subject->category_id = $request->category;
        if ($request->image != '') {
            $img = time() . '.' . $request->image->getClientOriginalExtension();
            $subject->image = $img;
            $request->image->move(public_path('images/medicines'), $img);
        }
        if ($subject->save()) {

            foreach ($request->questions as $key => $value) {
                $data = array(
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'title_id' => $subject->id,
                    'question' => $request->questions[$key],
                    'answer' => $request->answers[$key]);
                VeterinaryMedicine::insert($data);
            }
            return redirect('/veterinary_medicine')->with('success', 'تم الاضافة الاسئلة');
        }
    }

    public function updateSubjectVeterinary($id)
    {

        $subject = DB::table('subject')->where('id', $id)->first();
        $categories = DB::table('category')->where('type', 'veterinarymedicine')->get();
        return view('back.pages.admin.update_subject_veterinary')
            ->with('subject', $subject)
            ->with('categories', $categories);
    }

    public function editSubjectVeterinary($id, Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'category' => 'required',
        ]);
        if ($request->image == '') {
            $image = DB::table('subject')->select('image')->where('id', $id)->first();
            $img = $image->image;
        } else {
            $img = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/medicines'), $img);
        }

        DB::table('subject')->where('id', $id)->update(array(
            'title' => $request->title,
            'category_id' => $request->category,
            'image' => $img
        ));
        return redirect('/veterinary_medicine')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteSubjectVeterinary($id)
    {
        DB::table('subject')->where('id', $id)->delete();
        DB::table('veterinary_medicine')->where('title_id', $id)->delete();
        return redirect('/veterinary_medicine')->with('success', 'تم حذف بنجاح ');
    }

    public function detailsSubjectVeterinary($id)
    {
        $details = DB::table('veterinary_medicine')->where('title_id', $id)->get();
        $subject = DB::table('subject')->where('id', $id)->first();
        return view('back.pages.admin.veterinary_medicine_details')->with('details', $details)->with('subject', $subject);
    }

    public function addQuestionVeterinary($id)
    {
        return view('back.pages.admin.add_question_veterinary')->with('id', $id);
    }

    public function storeQuestionVeterinary($id, Request $request)
    {
        $this->validate(request(), [
            'questions.*' => 'required',
            'answers.*' => 'required'
        ]);
        foreach ($request->questions as $key => $value) {
            $data = array(
                'admin_id' => Auth::guard('admin')->user()->id,
                'title_id' => $id,
                'question' => $request->questions[$key],
                'answer' => $request->answers[$key]);
            VeterinaryMedicine::insert($data);
        }
        return redirect('/details-subject-veterinary/' . $id)->with('success', 'تم الاضافة التفاعل');
    }

    public function deleteVeterinary($id, Request $request)
    {
        DB::table('veterinary_medicine')->where('id', $id)->delete();
        return redirect('/details-subject-veterinary/' . $request->subject)->with('success', 'تم حذف بنجاح ');
    }

    public function updateVeterinary($id)
    {
        $veterinary = DB::table('veterinary_medicine')->where('id', $id)->first();
        return view('back.pages.admin.update_question_veterinary')->with('veterinary', $veterinary);
    }

    public function editVeterinary($id, Request $request)
    {
        $this->validate(request(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        $veterinary = DB::table('veterinary_medicine')->select('title_id')->where('id', $id)->first();
        DB::table('veterinary_medicine')->where('id', $id)->update(array(
            'question' => $request->question,
            'answer' => $request->answer,
        ));
        return redirect('/details-subject-veterinary/' . $veterinary->title_id)->with('success', 'تم تعديل بنجاح');
    }

    /////////// Videos Library ////////////
    public function getVideos()
    {
        $videos = DB::table('videos')
            ->join('admins', 'videos.admin_id', '=', 'admins.id')
            ->select('videos.*', 'admins.username')
            ->orderBy('videos.id', 'desc')->get();
        return view('back.pages.admin.videos')->with('videos', $videos);
    }

    public function addVideo()
    {
        return view('back.pages.admin.add_video');
    }

    public function storeVideo(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required',
            'url' => 'required',
        ]);
        $video = new Videos;
        $video->title = $request->title;
        $video->video_url = $request->url;
        $video->admin_id = Auth::guard('admin')->user()->id;
        $video->save();
        return redirect('/videos-library')->with('success', 'تم اضافة الفئة');
    }

    public function deleteVideo($id)
    {
        DB::table('videos')->where('id', $id)->delete();
        return redirect('/videos-library')->with('success', 'تم حذف بنجاح ');
    }

    public function updateVideo($id)
    {
        $video = DB::table('videos')->where('id', $id)->first();
        return view('back.pages.admin.add_video')->with('video', $video);
    }

    public function editVideo($id, Request $request)
    {

        $this->validate(request(), [
            'title' => 'required',
            'url' => 'required',
        ]);
        DB::table('videos')->where('id', $id)->update(array(
            'title' => $request->title,
            'video_url' => $request->url
        ));
        return redirect('/videos-library')->with('success', 'تم تعديل بنجاح');
    }

    public function detailsVideo($id)
    {
        $details = DB::table('videos')->where('id', $id)->first();
        return view('back.pages.admin.video_details')->with('details', $details);
    }

    /////////// SellBuyPlaces ////////////
    public function getAllSellBuyPlaces()
    {
        $places = DB::table('sell_buy_places')
            ->join('users', 'sell_buy_places.publisher_id', '=', 'users.id')
            ->join('place_types', 'sell_buy_places.place_type', '=', 'place_types.id')
            ->select('sell_buy_places.*', 'users.paid', 'users.username', 'place_types.title')
            ->orderBy('paid', 'DESC')
            ->orderBy('status', 'ASC')
            ->get();
        return view('back.pages.admin.all_buy_sales')
            ->with('places', $places);
    }

    public function detailsSellBuyPlaces($id)
    {
        $place = DB::table('sell_buy_places')->where('sell_buy_places.id', $id)
            ->join('users', 'sell_buy_places.publisher_id', '=', 'users.id')
            ->join('place_types', 'sell_buy_places.place_type', '=', 'place_types.id')
            ->select('sell_buy_places.*', 'users.paid', 'users.username', 'place_types.title')
            ->first();
        return view('back.pages.admin.place_details')
            ->with('place', $place);
    }

    public function acceptSellBuyPlaces($id)
    {
        DB::table('sell_buy_places')->where('id', $id)
            ->update(array('status' => 1));
        return redirect('/all-sell-places')->with('success', 'تم تعديل بنجاح');
    }

    public function rejectSellBuyPlaces($id)
    {
        DB::table('sell_buy_places')->where('id', $id)
            ->update(array('status' => 0));
        return redirect('/all-sell-places')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteSellBuyPlaces($id)
    {
        DB::table('sell_buy_places')->where('id', $id)->delete();
        return redirect('/all-sell-places')->with('success', 'تم حذف بنجاح');
    }

    /////////// job fair ////////////
    public function alljobsFair()
    {
        $dateFormat = date('m/d/Y');
        $jobs = DB::table('jobs')->where('expiry_date', '>=', $dateFormat)
            ->join('users', 'jobs.publisher_id', '=', 'users.id')
            ->join('job_types', 'jobs.job_type', '=', 'job_types.id')
            ->select('jobs.*', 'users.paid', 'users.username', 'job_types.title')
            ->orderBy('paid', 'DESC')
            ->orderBy('status', 'ASC')
            ->get();
        return view('back.pages.admin.all_jobs')
            ->with('jobs', $jobs);
    }

    public function detailsJob($id)
    {
        $job = DB::table('jobs')->where('jobs.id', '=', $id)
            ->join('users', 'jobs.publisher_id', '=', 'users.id')
            ->join('job_types', 'jobs.job_type', '=', 'job_types.id')
            ->select('jobs.*', 'users.paid', 'users.username', 'job_types.title')
            ->orderBy('paid', 'DESC')
            ->orderBy('status', 'ASC')
            ->first();
        return view('back.pages.admin.jobs_details')
            ->with('job', $job);
    }

    public function acceptJob($id)
    {
        DB::table('jobs')->where('id', $id)
            ->update(array('status' => 1));
        return redirect('/all-jobs-fair')->with('success', 'تم تعديل بنجاح');
    }

    public function rejectJob($id)
    {
        DB::table('jobs')->where('id', $id)
            ->update(array('status' => 2));
        return redirect('/all-jobs-fair')->with('success', 'تم تعديل بنجاح');
    }

    public function deleteJob($id)
    {
        DB::table('jobs')->where('id', $id)->delete();
        return redirect('/all-jobs-fair')->with('success', 'تم حذف بنجاح');
    }

    ///////////Reports//////////////
    public function getHomeClinic()
    {
        $homeclinics = DB::table('home_clinics')
            ->join('users', 'home_clinics.user_id', '=', 'users.id')
            ->join('clients', 'home_clinics.doctor_id', '=', 'clients.user_id')
            ->join('doc_type', 'home_clinics.doctor_type_id', '=', 'doc_type.id')
            ->select('home_clinics.*', 'users.paid', 'users.username', 'clients.c_fname', 'doc_type.doc_type')
            ->orderBy('paid', 'DESC')
            ->get();
        return view('back.pages.admin.homeclinic')
            ->with('homeclinics', $homeclinics);
    }

    public function deleteHomeClinic($id)
    {
        DB::table('home_clinics')->where('id', $id)->delete();
        return redirect('/home-clinic')->with('success', 'تم حذف بنجاح');
    }

    public function getAskDoctor()
    {
        $AskDoctors = DB::table('ask_doctors')
            ->join('users', 'ask_doctors.user_id', '=', 'users.id')
            ->join('clients', 'ask_doctors.doctor_id', '=', 'clients.user_id')
            ->join('doc_type', 'ask_doctors.doc_type_id', '=', 'doc_type.id')
            ->select('ask_doctors.*', 'users.paid', 'users.username', 'clients.c_fname', 'doc_type.doc_type')
            ->orderBy('paid', 'DESC')
            ->get();
        return view('back.pages.admin.ask_doctors')
            ->with('AskDoctors', $AskDoctors);
    }

    public function deleteAskDoctor($id)
    {
        DB::table('ask_doctors')->where('id', $id)->delete();
        return redirect('/get-ask-doctor')->with('success', 'تم حذف بنجاح');
    }

    public function ordersPharamFirm()
    {
        $orders = DB::table('request_medicins_pharm_firms')
            ->join('firms', 'request_medicins_pharm_firms.firm_id', '=', 'firms.user_id')
            ->join('pharmacys', 'request_medicins_pharm_firms.pharm_id', '=', 'pharmacys.user_id')
            ->join('firm_types', 'request_medicins_pharm_firms.firm_type_id', '=', 'firm_types.id')
            ->select('request_medicins_pharm_firms.*', 'firms.f_name', 'pharmacys.pharm_name', 'firm_types.title')
            ->get();
        return view('back.pages.admin.orders_firm_pharmacy')
            ->with('orders', $orders);
    }

    public function deleteOrders($id)
    {
        DB::table('request_medicins_pharm_firms')->where('id', $id)->delete();
        return redirect('/orders-firm-pharmacy')->with('success', 'تم حذف بنجاح');
    }

    public function orderdetails($id)
    {
        $order = DB::table('request_medicins_pharm_firms')->where('request_medicins_pharm_firms.id', $id)
            ->join('firms', 'request_medicins_pharm_firms.firm_id', '=', 'firms.user_id')
            ->join('pharmacys', 'request_medicins_pharm_firms.pharm_id', '=', 'pharmacys.user_id')
            ->join('firm_types', 'request_medicins_pharm_firms.firm_type_id', '=', 'firm_types.id')
            ->select('request_medicins_pharm_firms.*', 'firms.f_name', 'pharmacys.pharm_name', 'firm_types.title')
            ->first();

        return view('back.pages.admin.orders_details')
            ->with('order', $order);

    }

    /////////// treat aboard ////////////
    public function getCity(Request $request)
    {
        $data = DB::table('cities')->where('gov_id', $request->id)->get();
        return response()->json($data);

    }

    public function getGovernate(Request $request)
    {

        $data = DB::table('governorates')->where('country_id', $request->id)->get();
        return response()->json($data);

    }

    public function getTreatmentAbroad()
    {
        $abroads = DB::table('treatment_abroad')
            ->join('users', 'treatment_abroad.user_id', '=', 'users.id')
            ->join('countries', 'users.u_country', '=', 'countries.id')
            ->join('governorates', 'users.u_governorate', '=', 'governorates.id')
            ->select('treatment_abroad.*', 'users.username', 'users.status', 'countries.country_title', 'governorates.g_title')
            ->orderBy('treatment_abroad.id', 'DESC')
            ->get();
        return view('back.pages.admin.treatment_abroad')->with('abroads', $abroads);
    }

    public function addTreatmentAbroad()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        return view('back.pages.admin.add_treatment_abroad')->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities);
    }

    public function storeTreatmentAbroad(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image'=>'required'
        ]);
        // Register
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->u_type = $request->u_type;
        $user->status = 1;
        $user->u_country = $request->country;
        $user->u_governorate = $request->governorate;
        $user->u_city = $request->city;
        $user->u_address = $request->address;
        $user->password = bcrypt($request->password);
        $confirmation_code = str_random(30);
        $user->confirmation_code = $confirmation_code;
        $user->confirmed = 0;
        if ($request->image != '') {
            $image= time() . '.' . $request->image->getClientOriginalExtension();
            $user->image = $image;
            $request->image->move(public_path('images/profile'), $image);
        }

        $user->save();

        $treatment = new TreatmentAbroad;
        $treatment->hospital = $request->name;
        $treatment->user_id = $user->id;
        $treatment->save();
        return redirect('/treat-abroad')->with('success', ' تم الاضافة المستشفى');
    }

    public function deleteTreatmentAbroad($id)
    {
        $user_id = DB::table('treatment_abroad')->where('id', $id)->select('user_id')->first();
        DB::table('users')->where('id',$user_id->user_id)->delete();
        DB::table('treatment_abroad')->where('id', $id)->delete();
        return redirect('/treat-abroad')->with('success', 'تم حذف بنجاح');
    }

    public function updateTreatmentAbroad($id)
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $abroad = DB::table('treatment_abroad')->where('treatment_abroad.id', $id)
            ->join('users', 'treatment_abroad.user_id', '=', 'users.id')
            ->join('countries', 'users.u_country', '=', 'countries.id')
            ->join('governorates', 'users.u_governorate', '=', 'governorates.id')
            ->select('treatment_abroad.*', 'users.username', 'users.mobile', 'users.email', 'users.phone', 'users.u_address'
                , 'users.u_country', 'users.u_governorate', 'users.u_city')
            ->orderBy('treatment_abroad.id', 'DESC')
            ->first();
        return view('back.pages.admin.add_treatment_abroad')
            ->with('abroad', $abroad)
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities);
    }

    public function editTreatmentAbroad($id, Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        $user_id = DB::table('treatment_abroad')->where('id', $id)->select('user_id')->first();

        DB::table('treatment_abroad')->where('id', $id)->update(array(
            'hospital' => $request->name,
        ));
        DB::table('users')->where('id',$user_id->user_id)->update(array(
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'u_address' => $request->address,
            'u_country' => $request->country,
            'u_governorate' => $request->governorate,
            'u_city' => $request->city
        ));
        return redirect('/treat-abroad')->with('success', 'تم تعديل بنجاح');
    }

/////////////////////////////////////////////
    public function contactUsSetting()
    {
        return view('back.pages.admin.contact_us_setting');
    }

    public function messages()
    {
        return view('back.pages.admin.messages');
    }

    public function SocialLinksSetting()
    {
        $facebook = DB::table('social_links')->where('id', 1)->first(['title', 'link']);
        $twitter = DB::table('social_links')->where('id', 2)->first(['title', 'link']);
        $linkedin = DB::table('social_links')->where('id', 3)->first(['title', 'link']);
        $google_plus = DB::table('social_links')->where('id', 4)->first(['title', 'link']);
        return view('back.pages.admin.social_media')
            ->with('facebook', $facebook)
            ->with('twitter', $twitter)
            ->with('linkedin', $linkedin)
            ->with('google_plus', $google_plus);
    }

    public function SocialLinksEdit(Request $request)
    {
        if ($request->facebook != '') {
            DB::table('social_links')->where('id', 1)->update(array(
                'link' => $request->facebook
            ));
        }
        if ($request->twitter != '') {
            DB::table('social_links')->where('id', 2)->update(array(
                'link' => $request->twitter
            ));
        }
        if ($request->linkedin != '') {
            DB::table('social_links')->where('id', 3)->update(array(
                'link' => $request->linkedin
            ));
        }
        if ($request->google_plus != '') {
            DB::table('social_links')->where('id', 4)->update(array(
                'link' => $request->google_plus
            ));
        }

        return redirect()->back()->with('success', 'Your data updated Successfully');

    }

    public function aboutUsSetting()
    {
        $about = DB::table('abouts')->orderBy('created_at', 'desc')->first();
        return view('back.pages.admin.about_us_setting')->with('about', $about);

    }

    public function storeabout(Request $request)
    {
        $about = new About();
        $about->admin_id = Auth::user()->id;
        $about->about_text = $request->about_desc;
        $about->save();
        return redirect('/about-us-setting')->with('success', 'Done Add About');
    }

    public function updateabout(Request $request, $id)
    {
        DB::table('abouts')->where('id', $id)->update(array(
            'admin_id' => Auth::user()->id,
            'about_text' => $request->about_desc
        ));
        return redirect('/about-us-setting')->with('success', 'Done Updated About');
    }

 ///////////// users///////////////////
     public function getUsers()
     {
         $users=DB::table('users')->get();
          return view('back.pages.admin.users')->with('users',$users) ;
     }

     public function paid ($id)
     {

//         die();
         DB::table('users')->where('id', $id)
             ->update(['paid' => 1]);
//         return $id;
         return redirect('/get-users')->with('success', 'تم تعديل بنجاح');
     }

     public function unpaid ($id)
     {
         DB::table('users')->where('id', $id)
             ->update(['paid' => 0]);
         return redirect('/get-users')->with('success', 'تم تعديل بنجاح');
     }

     public function deactivateUser($id)
     {
         DB::table('users')->where('id', $id)
             ->update(['status' => 2]);
         return redirect('/get-users')->with('success', 'تم تعديل بنجاح');
     }

     public function activateUser($id)
     {
         DB::table('users')->where('id', $id)
             ->update(['status' => 1]);
         return redirect('/get-users')->with('success', 'تم تعديل بنجاح');
     }

}
