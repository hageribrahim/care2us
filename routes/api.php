<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API'], function () {
    Route::get('/getcountry', 'RegistrationController@getcountry');
    Route::get('/getdoctype', 'RegistrationController@doctype');
    Route::get('/getcity/{id}', 'RegistrationController@getcity');
    Route::get('/getgovernate/{city_id}', 'RegistrationController@getgovernate');
    Route::post('/userstore','RegistrationController@userStore');
    Route::post('/pharmacystore','RegistrationController@pharmacyStore');
    Route::post('/pharmacyupdate/{id}','RegistrationController@updatepharmacy');
    Route::post('/clientupdate/{id}','RegistrationController@updateclient');
    Route::post('/login','RegistrationController@login');
    Route::post('/logout','RegistrationController@logout');

   // Route::post('','');


});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
