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

/*admin*/ 
Route::get('/','HomeController@index');
Route::get('retribusi/potensi','DataRetribusiController@potensi');
Route::post('retribusi/potensi','DataRetribusiController@insertPotensi');

Route::get('retribusi/data','DataRetribusiController@retribusi');
Route::post('retribusi/data','DataRetribusiController@insertRetribusi');
Route::get('retribusi/banding','DataRetribusiController@banding');

Route::get('rekomendasi/','ReportBedaController@index');

Route::get('survey/','SurveyBaru@index');

/*grader*/
Route::get('grader/start/pemerintah','DataRetribusiController@startPemerintah');
Route::get('grader/stop/pemerintah','DataRetribusiController@stopPemerintah');
Route::get('grader/start/swasta','DataRetribusiController@startSwasta');
Route::get('grader/stop/swasta','DataRetribusiController@stopSwasta');