<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::resource('/myProfile','ProfileController');
Route::get('/searchPatient','ProfileController@search');
Route::post('/patientDetails','ProfileController@view');
Route::resource('/newVisit','VisitController');
Route::get('/searchMedication','VisitController@search');
Route::post('/medicationHistory','VisitController@history');
Route::get('medicationDetails/{id}','VisitController@view');
Route::get('/patientMedicationHistory','VisitController@patientHistory');