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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes(['verify' => true, 'login' => false, 'register' => false]);

Route::get('/login', function(){ return abort(404); });
Route::get('/register', function(){ return abort(404); });

Route::post('/verifyemail', 'Auth\RegisterController@verifyemail')->name('verifyemail');
Route::post('/login', 'Auth\LoginController@check_login')->name('login.check_login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/reset_password', 'Auth\ForgotPasswordController@resetPassword')->name('reset_password');

Route::middleware('verified')->prefix('dashboard')->group(function(){
    Route::middleware('verified')->get('/', 'DashboardController@index')->name('dashboard');
});


