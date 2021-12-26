<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/','App\Http\Controllers\HomeController@index');
//determine the user
Route::get('/home','App\Http\Controllers\HomeController@redirect')->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view','App\Http\Controllers\AdminController@addview');
Route::get('/admin_home','App\Http\Controllers\AdminController@dashboard');

Route::post('/upload_doctor','App\Http\Controllers\AdminController@upload');

Route::post('/appointment','App\Http\Controllers\HomeController@appointment');

Route::get('/myappointment','App\Http\Controllers\HomeController@myappointment');

Route::get('/cancel_appoint/{id}','App\Http\Controllers\HomeController@cancel_appoint');

Route::get('/showappointment','App\Http\Controllers\AdminController@showappointment');
Route::get('/approved/{id}','App\Http\Controllers\AdminController@approved');
Route::get('/deleted/{id}','App\Http\Controllers\AdminController@deleted');


Route::get('/showdoctor','App\Http\Controllers\AdminController@showdoctor');
Route::get('/deletedoctor/{id}','App\Http\Controllers\AdminController@deletedoctor');
Route::get('/updatedoctor/{id}','App\Http\Controllers\AdminController@updatedoctor');
Route::post('/editdoctor/{id}','App\Http\Controllers\AdminController@editdoctor');

Route::get('/emailview/{id}','App\Http\Controllers\AdminController@emailview');
Route::post('/sendemail/{id}','App\Http\Controllers\AdminController@sendemail');