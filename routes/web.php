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
Route::get('/home','App\Http\Controllers\HomeController@redirect');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view','App\Http\Controllers\AdminController@addview');
Route::get('/admin_home','App\Http\Controllers\AdminController@dashboard');
