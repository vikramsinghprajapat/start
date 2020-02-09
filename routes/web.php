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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 
Route::get('get-vehicle-model', 'ServiceRequestController@getVehicleModel');
 
Route::post('create-request', 'ServiceRequestController@store');
Route::get('service-list', 'ServiceRequestController@getServiceList');
Route::get('service-edit/{id}', 'ServiceRequestController@edit');
Route::POST('update-request', 'ServiceRequestController@updateRequest');
Route::DELETE('service-destroy/{id}', 'ServiceRequestController@deleteRequest');
