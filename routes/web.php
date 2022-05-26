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

Route::post('/verifyemail', 'HomeController@verifyemail')->name('verifyemail');
Route::post('/login', 'Auth\LoginController@check_login')->name('login.check_login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/reset_password', 'Auth\ForgotPasswordController@resetPassword')->name('reset_password');

Route::middleware('verified')->prefix('dashboard')->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::get('/manajemenrole', 'DashboardController@manage_role')->name('manage_role');
    
    Route::name('manage_role.')->prefix('manajemenrole')->group(function() {
        Route::post('/users', 'DashboardController@get_users')->name('users');
        Route::post('/get_user', 'DashboardController@get_user')->name('get_user');
        Route::post('/add_user', 'DashboardController@add_user')->name('add_user');
        Route::patch('/update_user', 'DashboardController@update_user')->name('update_user');
        Route::delete('/delete_user', 'DashboardController@delete_user')->name('delete_user');

        Route::post('/roles', 'DashboardController@get_roles')->name('roles');
        Route::post('/get_role', 'DashboardController@get_role')->name('get_role');

        Route::post('/permissions', 'DashboardController@get_permissions')->name('permissions');
    });

    Route::get('/manajemenruangan', 'RoomController@index')->name('manage_room');
    Route::name('manage_room.')->prefix('manajemenruangan')->group(function() {
        Route::post('/rooms', 'RoomController@get_rooms')->name('rooms');
        Route::post('/room', 'RoomController@get_room')->name('get_room');
        Route::post('/check', 'RoomController@check')->name('check');
        Route::post('/add_room', 'RoomController@add_room')->name('add_room');
        Route::patch('/update_room', 'RoomController@update_room')->name('update_room');
        Route::delete('/delete_room', 'RoomController@delete_room')->name('delete_room');
    });

    Route::get('/studibanding', 'ComparativeController@index')->name('studi_banding');
    Route::name('studi_banding.')->prefix('studibanding')->group(function() {
        Route::post('/all/{type}', 'ComparativeController@all')->name('all');
        Route::post('/store', 'ComparativeController@store')->name('store');
        Route::delete('/delete', 'ComparativeController@delete')->name('delete');
    });

    Route::post('/get_institusi', 'InstitutionController@get')->name('get_institution');
    Route::post('/verify_institusi', 'InstitutionController@check')->name('verify_institution');
    Route::post('/store_institusi', 'InstitutionController@store')->name('store_institution');
});


