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

/*input data*/

Route::get('retribusi/tunggakanPemerintah','DataRetribusiController@tunggakanPemerintah');
Route::post('retribusi/tunggakanPemerintah','DataRetribusiController@insertTunggakanPemerintah');
Route::get('retribusi/tunggakanSwasta','DataRetribusiController@tunggakanSwasta');
Route::post('retribusi/tunggakanSwasta','DataRetribusiController@insertTunggakanSwasta');

Route::get('retribusi/retribusiPemerintah','DataRetribusiController@retribusiPemerintah');
Route::post('retribusi/retribusiPemerintah','DataRetribusiController@insertRetribusiPemerintah');
Route::get('retribusi/retribusiSwasta','DataRetribusiController@retribusiSwasta');
Route::post('retribusi/retribusiSwasta','DataRetribusiController@insertRetribusiSwasta');

Route::get('retribusi/banding','DataRetribusiController@banding');


Route::get('retribusi/pasangbaru','DataRetribusiController@pasangBaru');
Route::post('retribusi/pasangbaru','DataRetribusiController@insertPasangBaru');

Route::get('rekomendasi/','ReportBedaController@index');

Route::get('survey/','SurveyBaru@index');

/*grader*/
Route::get('grader/start/pemerintah','DataRetribusiController@startPemerintah');
Route::get('grader/stop/pemerintah','DataRetribusiController@stopPemerintah');
Route::get('grader/start/swasta','DataRetribusiController@startSwasta');
Route::get('grader/stop/swasta','DataRetribusiController@stopSwasta');

/*Nunggak dan lunas*/
Route::get('list/nunggak/pemerintah','DataRetribusiController@nunggakPemerintah');
Route::post('list/nunggak/pemerintah','DataRetribusiController@nunggakPemerintah');
Route::get('list/lunas/pemerintah','DataRetribusiController@lunasPemerintah');
Route::post('list/lunas/pemerintah','DataRetribusiController@lunasPemerintah');
Route::get('list/nunggak/swasta','DataRetribusiController@nunggakSwasta');
Route::post('list/nunggak/swasta','DataRetribusiController@nunggakSwasta');
Route::get('list/lunas/swasta','DataRetribusiController@lunasSwasta');
Route::post('list/lunas/swasta','DataRetribusiController@lunasSwasta');


/*API*/
Route::get('api/nunggak/pemerintah/{tahun}/{bulan}/{page}','APIController@getTunggakanPemerintah');
Route::get('api/nunggak/swasta/{tahun}/{bulan}/{page}','APIController@getTunggakanSwasta');

Route::get('api/getBulan/pemerintah/{tahun}/{jenis}/{tipe}/','APIController@getBulan');
Route::get('api/getPage/pemerintah/{tahun}/{bulan}/{jenis}/{tipe}','APIController@getPage');

