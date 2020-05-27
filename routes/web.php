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

use App\Events\FormSubmittedEvent;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/counter', function () {
    return view('counter');
});

Route::get('/sender', function () {
    return view('sender');
});

Route::post('/sender',function(){

    event(new FormSubmittedEvent());

});

Route::get('/dashboard','DashboardController@displayDashboard');
Route::post('/createUser','DashboardController@createUser');





