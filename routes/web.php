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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes(['verify' => true, 'login' => false, 'register' => false]);

Route::get('/login', function(){ return abort(404); });
Route::get('/register', function(){ return abort(404); });

Route::post('/verifyemail', 'Auth\RegisterController@verifyemail')->name('verifyemail');
Route::post('/login', 'Auth\LoginController@check_login')->name('login.check_login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/reset_password', 'Auth\ForgotPasswordController@resetPassword')->name('reset_password');

Route::middleware('verified')->prefix('dashboard')->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::get('/manajemenrole', 'DashboardController@manage_role')->name('manage_role');
    
    Route::name('manage_role.')->prefix('manajemenrole')->group(function() {
        Route::post('/users', 'DashboardController@get_users')->name('users');
        Route::post('/roles', 'DashboardController@get_roles')->name('roles');
        Route::post('/permissions', 'DashboardController@get_permissions')->name('permissions');
    });

    Route::get('/manajemenruangan', 'DashboardController@manage_room')->name('manage_room');
});


