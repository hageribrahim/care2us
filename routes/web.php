<?php

// front
Route::get('/', 'HomeController@home');

//user login
Route::get('/login', 'UserController@login');
Route::get('checklogin', array('as' => 'checklogin', function () {
    if (isset(Auth::user()->id) && Auth::user()->confirmed == 1) {
        if (Auth::user()->u_type == 1 || Auth::user()->u_type == 2) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 3) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 4) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 5) {
            return redirect('/');
        }  elseif (Auth::user()->u_type == 6) {
            return redirect('/');
        }
        else {
            auth()->logout();
            return redirect('/');
        }
    } else {
        auth()->logout();
        return redirect('/login')->with('fail', 'الحساب غير مفعل , برجاء فحص البريد الالكترونى لتفعيل الحساب');
    }
}));
Route::post('sessionstore', 'SessionController@sessionStore');

//regiser
Route::get('/client-register', 'RegistrationController@clientRegister');
Route::get('/pharmacy-register', 'RegistrationController@pharmacyRegister');
Route::get('/pharmacist-register', 'RegistrationController@pharmacistRegister');
Route::get('/firm-register', 'RegistrationController@firmRegister');

Route::post('/client-store', 'RegistrationController@userStore');
Route::post('/pharmacist-store', 'RegistrationController@userStore');
Route::post('/pharmacy-store', 'RegistrationController@userStore');
Route::post('/firm-store', 'RegistrationController@userStore');

//verify email
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);
Route::get('/about-us', 'AboutusController@aboutus');
Route::get('/contact-us', 'ContactusController@contactus');
Route::get('/reactive-drugs', 'HomeController@getDrugsReactionHome');
Route::get('/get-all-videos','UserController@allVideos');
Route::get('/video/{id}','UserController@video');
Route::get('/treatment-plans','UserController@treatmeantPlans');
Route::get('/drugs','HomeController@getDrugsReaction');
Route::get('/drugs-food','HomeController@getDrugsFoodReaction');
Route::get('/all-Veterinary','UserController@getVeterinary');

Route::group(['middleware' => ['chackuser', 'auth']], function () {

    //General  Functions=>ClientController
    Route::get('/client-account', 'ClientController@account');
    Route::get('/client-account-setting/', 'ClientController@accountSetting');
    Route::post('/update-client/{user_id}', 'ClientController@updateClient');
    Route::get('/ask-file', 'ClientController@getMyAsk');
    Route::get('/ask-doctor', 'ClientController@askDoctor');
    Route::post('/store-ask-doctor', 'ClientController@storeAskDoctor');
    Route::get('/delete-ask-doctor/{ask_id}', 'ClientController@deleteAskDoctor');
    Route::get('/modify-ask-doctor/{ask_id}', 'ClientController@modifyAskDoctor');
    Route::post('/edit-ask-doctor/{ask_id}', 'ClientController@editAskDoctor');
    Route::get('/medical-file', 'ClientController@medicalFile');
    Route::get('/add-medical-file', 'ClientController@addmedicalFile');
    Route::post('/store-medical/', 'ClientController@storeMedicalFile');
    Route::get('/delete-medical-file/{file_id}', 'ClientController@deleteMedicalFile');
    Route::get('/modify-medical-file/{file_id}', 'ClientController@modifyMedicalFile');
    Route::post('/edit-medical-file/{file_id}', 'ClientController@editMedicalFile');
    Route::get('/details-medical-file/{file_id}', 'ClientController@detailsMedicalFile');
    Route::get('/client-request-medicine', 'ClientController@requestMedicine');
    Route::get('getpackages/', 'ClientController@getpackages');
    Route::post('/request-medicine-search', 'ClientController@requestmedicineask');
    Route::get('/details-medicine-request/{id}','ClientController@detailsRequestMedicine');
    Route::get('/request-file', 'ClientController@requestget');
    Route::get('getcity', 'ClientController@getcity');
    Route::get('getpharm', 'ClientController@getpharm');
    Route::get('clickpharm', 'ClientController@clickpharm');
    //Route::post('/getgovernorate/{val}','ClientController@getGov');
    Route::get('/edite-request/{id}', 'ClientController@editerequest');
    Route::get('/delete-request/{id}', 'ClientController@deleterequest');
    Route::post('/edite-done/{id}', 'ClientController@editeDone');

    Route::get('/getdoctors', 'ClientController@getdoctors');
    Route::get('/askDoctors-details/{ask_id}', 'ClientController@AskDoctorsDetails');
    Route::post('/store-comments/{ask_id}', 'ClientController@storeComment');
    Route::get('/gethomedoc/', 'ClientController@gethomedoc');
    Route::get('/gethomename/', 'ClientController@gethomename');
    Route::get('/gethomedocscp/', 'ClientController@gethomedocscp');
    Route::post('/store-home-clinic/', 'ClientController@storehomeclinic');
    Route::get('/home-clinics', 'ClientController@getHomeClinic');
    Route::get('/getDRImage', 'ClientController@getDrImage');

    Route::get('/medical-consulation', 'ClientController@getMyAsk');
    Route::get('/all-home-clinic', 'ClientController@getHomeClinic');
    Route::post('/store-comments-clinic/{id}', 'ClientController@storeCommentsClinic');
    Route::get('/reject-home-clinic/{home_id}', 'ClientController@rejectHomeClinic');
    Route::get('/accept-home-clinic/{home_id}', 'ClientController@acceptHomeClinic');
    Route::get('/details-home-clinic/{home_id}', 'ClientController@homeclinicDetails');
    Route::get('/delete-home-clinic/{id}', 'ClientController@deleteHomeClinic');
    Route::get('/get-doctor-type','ClientController@getDoctorType');
    Route::get('/ask-home-clinic', 'ClientController@askHomeClinic');
    Route::get('/getcvdoc/', 'ClientController@getcvdoc');
});

Route::group(['middleware' => 'auth'], function () {

    //General  Functions=>UserController
    Route::get('/places', 'UserController@AllPlaces');
    Route::get('/all-jobs', 'UserController@alljobs');
    Route::get('/jobs', 'UserController@jobs');
    Route::get('/add-job', 'UserController@addJob');
    Route::post('/store-job', 'UserController@storeJob');
    Route::get('/edit-job/{job_id}', 'UserController@editJob');
    Route::post('/update-job/{job_id}', 'UserController@updateJob');
    Route::get('/delete-job/{job_id}', 'UserController@deleteJob');
    Route::get('/sell-buy-places', 'UserController@sellBuyPlaces');
    Route::get('/add-sell-buy-place', 'UserController@addSellBuyPlace');
    Route::post('/store-sell-buy-place', 'UserController@storeSellBuyPlace');
    Route::get('/edit-sell-buy-place/{place_id}', 'UserController@editSellBuyPlace');
    Route::post('/update-sell-buy-place/{place_id}', 'UserController@updateSellBuyPlace');
    Route::get('/delete-place/{place_id}', 'UserController@deletePlace');
    Route::get('/cure2us-offers', 'UserController@cure2usOffers');
    Route::get('/details-cure2us-offers/{id}','UserController@detailsCure2usOffers');


    //pharmacy   Functions=>PharmacyController
    Route::get('/pharmacy-account', 'PharmacyController@account');
    Route::get('/pharmacy-account-setting/', 'PharmacyController@accountSetting');
    Route::post('/update-pharmacy/{user_id}', 'PharmacyController@updatePharmacy');
    Route::get('/firms-offers', 'PharmacyController@firmsOffers');
    Route::get('/request-firms-offers/{id}', 'PharmacyController@requestFirmsOffers');
    Route::get('/getFirms/', 'PharmacyController@getFirms');
    Route::get('/getMedicine/', 'PharmacyController@getMedicine');
    Route::get('/orders-medicines', 'PharmacyController@ordersMedicine');
    Route::get('/pharmacy-request-medicine', 'PharmacyController@requestMedicine');
    Route::get('/details-request-pharm-medicine/{order_id}','PharmacyController@detailsRequestMedicinePharm');
    Route::post('/store-request-pharm-medicine', array('as' => 'storeRequestMedicine', 'uses' => 'PharmacyController@storeRequestMedicine'));
    Route::get('/add-request-pharm-medicine', 'PharmacyController@addrequestMedicine');
    Route::get('/get-price','PharmacyController@getMedicinePrice');
    Route::get('/delete-request-pharm-medicine/{request_id}', 'PharmacyController@deleteRequestMedicinePharm');
    Route::get('/edit-request-pharm-medicine/{request_id}', 'PharmacyController@editRequestMedicinePharm');
    Route::post('/update-request-pharm-medicine/{request_id}', 'PharmacyController@updateRequestMedicinePharm');
    Route::get('/details-request-medicine/{order_id}', 'PharmacyController@detailsOrderMedcine');
    Route::post('/update-status-request-medicine/{order_id}', 'PharmacyController@updateStatusOrderMedcine');
    Route::get('/excess-medicines', 'PharmacyController@excessMedicines');
    Route::get('/requset-excess-medicines/{requset_id}', 'PharmacyController@requestExcessMedicines');
    Route::post('/add-requset-excess-medicines/{requset_id}', 'PharmacyController@addRequestExcessMedicines');
    Route::get('/surplus-medicines', 'PharmacyController@surplusMedicines');
    Route::get('/add-surplus-medicines', 'PharmacyController@addSurplusMedicines');
    Route::post('/store-surplus-medicines', 'PharmacyController@storeSurplusMedicines');
    Route::get('/edit-surplus-medicines/{surplus_id}', 'PharmacyController@editSurplusMedicines');
    Route::post('/update-surplus-medicines/{surplus_id}', 'PharmacyController@updateSurplusMedicines');
    Route::get('/delete-surplus-medicines/{surplus_id}', 'PharmacyController@deleteSurplusMedicines');
    Route::get('/request-surplus-medicines', 'PharmacyController@requestSurplusMedicines');
    Route::get('/accept-request-surplus/{excess}', 'PharmacyController@acceptRequestSurplusMedicines');
    Route::get('/reject-request-surplus/{excess}', 'PharmacyController@rejectRequestSurplusMedicines');

    //firms  Functions=>FirmController
    Route::get('/firm-account', 'FirmController@account');
    Route::get('/firm-account-setting/', 'FirmController@accountSetting');
    Route::post('/update-firm/{user_id}', 'FirmController@updateFirm');
    Route::get('/firm-offers', 'FirmController@firmOffers');
    Route::get('/orders-offer','FirmController@orderFirmOffer');
    Route::get('/accept-orders-offer/{id}','FirmController@acceptOfferOrder');
    Route::get('/reject-orders-offer/{id}','FirmController@rejectOfferOrder');
    Route::get('/add-firm-offer', 'FirmController@addFirmOffer');
    Route::post('/store-firm-offer', 'FirmController@storeFirmOffer');
    Route::get('/modify-firm-offer/{offer_id}', 'FirmController@modifyFirmOffer');
    Route::post('/update-firm-offer', 'FirmController@updateFirmOffer');
    Route::get('/delete-firm-offer/{offer_id}', 'FirmController@deleteFirmOffer');
    Route::get('/firm-medicines', 'FirmController@firmMedicines');
    Route::get('/add-firm-medicine', 'FirmController@addFirmMedicine');
    Route::post('/store-firm-medicine', 'FirmController@storeFirmMedicine');
    Route::get('/delete-firm-medicine/{medicine_id}', 'FirmController@deleteFirmMedicine');
    Route::get('/edit-firm-medicine/{medicine_id}', 'FirmController@editFirmMedicine');
    Route::post('/update-firm-medicine/{medicine_id}', 'FirmController@updateFirmMedicine');
    Route::get('/details-firm-medicine/{medicine_id}', 'FirmController@detailsFirmMedicine');
    Route::get('/preview-statistics', 'FirmController@previewStatistics');
    Route::get('/add-statistics','FirmController@addStatistics');
    Route::post('/store-statistics','FirmController@storeStatistics');
    Route::get('/delete-statistics/{id}','FirmController@deleteStatistics');
    Route::get('/edit-statistics/{id}','FirmController@editStatistics');
    Route::post('/update-statistics/{id}','FirmController@updateStatistics');
    Route::get('/compare-statistics/{id}','FirmController@compareStatistics');
    Route::get('/get-precentage','FirmController@getPrecentage');
    ////////Cure2us offer ////////////////////////////
    Route::get('/add-cure2us-offer','FirmController@addCure2usOffer');
    Route::post('/store-cure2us-offer','FirmController@storeCure2usOffer');
    Route::get('/your-cure2us-offer','FirmController@getCure2usoffer');
    Route::get('/delete-cur2es-offer/{id}','FirmController@deleteCure2usoffer');
    Route::get('/edit-cur2es-offer/{id}','FirmController@editCure2usoffer');
    Route::post('/update-cur2es-offer/{id}','FirmController@updateCure2usoffer');
    /////// Reuest Medicine from Pharmacy//////////
    Route::get('/request-medicine-pharm', 'FirmController@requestMedicinePharm');
    Route::get('/details-request-medicine-pharm/{order_id}','FirmController@detailsRequestMedicinePharm');
    Route::get('/accept-request/{request_id}', 'FirmController@acceptRequestMedicinePharm');
    Route::get('/reject-request/{request_id}', 'FirmController@rejectRequestMedicinePharm');

    //Hospital   Functions=>HospitalController
    Route::get('/hospital-account', 'HospitalController@account');
    Route::get('/hospital-account-setting/', 'HospitalController@accountSetting');
    Route::post('/update-hospital/{user_id}', 'HospitalController@updateHospital');

    //logout
    Route::post('logout', 'SessionController@destroy');

});

// admin
Route::get('/ph-admin', function () {
    return view('back.pages.admin.login');
});

Route::post('adminsessionstore', 'SessionController@adminSessionStore');

// Route::get('adminchecklogin',array('as'=>'adminchecklogin',function(){
//     if (isset(Auth::user()->id) && Auth::user()->admin == 1)
//     {
//         if(Auth::user()->u_type == 1)
//         {
//             return redirect('/admin');
//         }elseif(Auth::user()->u_type == 2){
//             return redirect('/admin');
//         }else{
//             auth()->logout();
//             return redirect('/admin');
//         }
//     }else{
//         auth()->logout();
//         return redirect()->back();
//     }
// }));

Route::get('adminchecklogin', array('as' => 'adminchecklogin', function () {
    if (isset(Auth::guard('admin')->user()->id) && Auth::guard('admin')->user()->status == 1) {
        if (Auth::guard('admin')->user()->super_admin == 1 || Auth::guard('admin')->user()->websites_admin == 1 || Auth::guard('admin')->user()->ads_admin == 1) {
            return redirect('/admin-account');
        } else {
            auth()->logout();
            return redirect('/');
        }

    } else {
        return redirect('/ph-admin')->with('loginerror', 'الحساب غير مفعل');
    }
}));

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
Route::group(['middleware' => 'auth:admin'], function () {
    //General  Functions=>adminController
    ////////////////Admins /////////////////
    Route::get('/admin-account', 'AdminController@account');
    Route::get('/add-admin', 'AdminController@adminRegister');
    Route::post('/admin-store', 'AdminController@storeAdmin');
    //*******25-4 HW*********//
    Route::get('/admins', 'AdminController@getAdmins');
    Route::get('/update-admin/{admin_id}', 'AdminController@updateAdmin');
    //*******29-4 HW*********//
    Route::post('/edit-admin/{admin_id}', 'AdminController@editAdmin');
    Route::get('/deactivate-admin/{admin_id}', 'AdminController@deactivateAdmin');
    Route::get('/activate-admin/{admin_id}', 'AdminController@activateAdmin');
    //****************//
    Route::get('/admin', 'AdminController@main');
    ///////////////////////////////////////////////
    Route::post('/store-about', 'AdminController@storeabout');
    Route::post('/update-about/{id}', 'AdminController@updateabout');
    ///////// Drugs Reactions///////////////////////
    Route::get('/drug-reaction', 'AdminController@getDrugsReaction');
    Route::get('/add-drug-reaction', 'AdminController@addDrugsReaction');
    Route::post('/store-drug-reaction', array('as' => 'storeDrugsReaction', 'uses' => 'AdminController@storeDrugsReaction'));
    Route::get('/update-reactive/{reactive_id}', 'AdminController@updateMedcineReactive');
    Route::post('/edit-reactive/{reactive_id}', 'AdminController@editMedcineReactive');
    Route::get('/delete-reactive/{reactive_id}', 'AdminController@deleteMedcineReactive');
    ///////// Drugs Foods Reactions///////////////////////
    Route::get('/drug-food-reaction', 'AdminController@getDrugsFoods');
    Route::get('/add-drug-food-reaction', 'AdminController@addDrugsFoods');
    Route::post('/store-drug-food', array('as' => 'storeDrugsFoods', 'uses' => 'AdminController@storeDrugsFoods'));
    Route::get('/delete-drug-food/{reactive_id}', 'AdminController@deleteDrugsFoods');
    Route::get('/update-drug-food/{reactive_id}', 'AdminController@updateDrugsFoods');
    Route::post('/edit-drug-food/{reactive_id}', 'AdminController@editDrugsFoods');
    /////////Treatment Abroad///////////////////////
    Route::get('getGovernate/', 'AdminController@getGovernate');
    Route::get('getCity', 'AdminController@getCity');
    Route::get('/treat-abroad', 'AdminController@getTreatmentAbroad');
    Route::get('/add-treat-abroad', 'AdminController@addTreatmentAbroad');
    Route::post('/store-treat-abroad', 'AdminController@storeTreatmentAbroad');
    Route::get('/delete-treat-abroad/{id}', 'AdminController@deleteTreatmentAbroad');
    Route::get('/update-treat-abroad/{id}', 'AdminController@updateTreatmentAbroad');
    Route::post('/edit-treat-abroad/{id}', 'AdminController@editTreatmentAbroad');
    /////////Categories///////////////////////
    Route::get('/categories', 'AdminController@getCategory');
    Route::get('/add-category', 'AdminController@addCategory');
    Route::post('/store-category', 'AdminController@storeCategory');
    Route::get('/delete-category/{id}', 'AdminController@deleteCategory');
    Route::get('/update-category/{id}', 'AdminController@updateCategory');
    Route::post('/edit-category/{id}', 'AdminController@editCategory');
    ////////Common Disease/////////////////
    Route::get('/common-dieases', 'AdminController@getCommonDiseases');
    Route::get('/add-common-dieases', 'AdminController@addCommonDisease');
    Route::post('/store-common-dieases', 'AdminController@storeCommonDisease');
    Route::get('/update-subject/{id}', 'AdminController@updateSubject');
    Route::post('/edit-subject/{id}', 'AdminController@editSubject');
    Route::get('/delete-subject/{id}', 'AdminController@deleteSubject');
    Route::get('/details-subject/{id}', 'AdminController@detailsSubject');
    Route::get('/add-question/{id}', 'AdminController@addQuestionDisease');
    Route::post('/store-question/{id}', 'AdminController@storeQuestionDisease');
    Route::post('/delete-question/{id}', 'AdminController@deleteDisease');
    Route::get('/update-question/{id}', 'AdminController@updatDisease');
    Route::post('/edit-question/{id}', 'AdminController@editDisease');
    ////////Veterinary Medicine/////////////////
    Route::get('/veterinary_medicine', 'AdminController@getVeterinaryMedicine');
    Route::get('/add-veterinary_medicine', 'AdminController@addVeterinaryMedicine');
    Route::post('/store-veterinary_medicine', 'AdminController@storeVeterinaryMedicine');
    Route::get('/update-subject-veterinary/{id}', 'AdminController@updateSubjectVeterinary');
    Route::post('/edit-subject-veterinary/{id}', 'AdminController@editSubjectVeterinary');
    Route::get('/delete-subject-veterinary/{id}', 'AdminController@deleteSubjectVeterinary');
    Route::get('/details-subject-veterinary/{id}', 'AdminController@detailsSubjectVeterinary');
    Route::get('/add-question-veterinary/{id}', 'AdminController@addQuestionVeterinary');
    Route::post('/store-question-veterinary/{id}', 'AdminController@storeQuestionVeterinary');
    Route::post('/delete-question-veterinary/{id}', 'AdminController@deleteVeterinary');
    Route::get('/update-question-veterinary/{id}', 'AdminController@updateVeterinary');
    Route::post('/edit-question-veterinary/{id}', 'AdminController@editVeterinary');
    ////////Videos Library /////////////////
    Route::get('/videos-library', 'AdminController@getVideos');
    Route::get('/add-video', 'AdminController@addVideo');
    Route::post('/store-video', 'AdminController@storeVideo');
    Route::get('/delete-video/{id}', 'AdminController@deleteVideo');
    Route::get('/update-video/{id}', 'AdminController@updateVideo');
    Route::post('/edit-video/{id}', 'AdminController@editVideo');
    Route::get('/details-video/{id}', 'AdminController@detailsVideo');
    //////// sell places  /////////////////
    Route::get('/all-sell-places', 'AdminController@getAllSellBuyPlaces');
    Route::get('/details-sell-places/{id}', 'AdminController@detailsSellBuyPlaces');
    Route::get('/accept-sell-place/{id}', 'AdminController@acceptSellBuyPlaces');
    Route::get('/reject-sell-place/{id}', 'AdminController@rejectSellBuyPlaces');
    Route::get('/delete-sell-place/{id}', 'AdminController@deleteSellBuyPlaces');
    //////// Job fairs///////////////////
    Route::get('/all-jobs-fair', 'AdminController@alljobsFair');
    Route::get('/details-jobs-fair/{id}', 'AdminController@detailsJob');
    Route::get('/accept-job-fair/{id}', 'AdminController@acceptJob');
    Route::get('/reject-job-fair/{id}', 'AdminController@rejectJob');
    Route::get('/delete-job-fair/{id}', 'AdminController@deleteJob');
    ////////Reports///////////////////
    Route::get('/home-clinic', 'AdminController@getHomeClinic');
    Route::get('/delete-home-clinic/{id}', 'AdminController@deleteHomeClinic');
    Route::get('/get-ask-doctor', 'AdminController@getAskDoctor');
    Route::get('/delete-ask/{id}','AdminController@deleteAskDoctor');
    Route::get('/orders-firm-pharmacy', 'AdminController@ordersPharamFirm');
    Route::get('/delete-orders/{id}','AdminController@deleteOrders');
    Route::get('/details-orders/{id}', 'AdminController@orderdetails');
    ///////////////////////////////////////////////
    //  Route::get('/admin', 'AdminController@main');
    Route::get('/about-us-setting', 'AdminController@aboutUsSetting');
    Route::get('/contact-us-setting', 'AdminController@contactUsSetting');
    Route::get('/messages', 'AdminController@messages');
    Route::get('/social-links-setting', 'AdminController@SocialLinksSetting');
    Route::post('/social-links-edit', 'AdminController@SocialLinksEdit');
    Route::post('/logout-admin', 'SessionController@destroy');
////////////////////useres/////////////////////////

    Route::get('/get-users','AdminController@getUsers');
    Route::get('/paid/{id}','AdminController@paid');
    Route::get('/unpaid/{id}','AdminController@unpaid');
    Route::get('/deactivate-user/{id}','AdminController@deactivateUser');
    Route::get('/activate-user/{id}','AdminController@activateUser');
});

//}]);
