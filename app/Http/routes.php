<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Login
Route::get('/','LoginController@index');
Route::get('login', 'LoginController@formLogin');
Route::post('login', 'LoginController@login');

//Logout
Route::get('logout', 'LoginController@logout');

//Home
Route::get('home', 'HomeController@index');

//import
Route::post('import', 'ExcelController@wilayah'); 

//administrasi
Route::get('{id_Survey}/administrasi','AdministrasiController@index');
Route::get('{id_Survey}/administrasi/delete/{id_User}', 'AdministrasiController@delete');

//Survey
Route::get('createsurvey', 'SurveyController@index');
Route::post('createsurvey', 'SurveyController@create');
Route::get('{id_Survey}', 'SurveyController@survey');
Route::get('{id_Survey}/{id_Tahapan}', 'SurveyController@progress');

//input data
Route::get('input/data', 'InputdataController@index');
Route::post('input/data/import', 'ExcelController@importwilayah');

//inputtahapan
Route::get('survey/form', 'TahapanController@home');
Route::get('survey/tahapan', 'TahapanController@create');

//inputprogress
Route::get('{id_Survey}/{id_Tahapan}/inputprogress', 'InputProgressController@index');

