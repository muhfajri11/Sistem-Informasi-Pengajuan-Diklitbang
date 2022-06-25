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

Route::get('/test', 'TestController@index');

Route::post('/verifyemail', 'HomeController@verifyemail')->name('verifyemail');
Route::post('/login', 'Auth\LoginController@check_login')->name('login.check_login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/reset_password', 'Auth\ForgotPasswordController@resetPassword')->name('reset_password');

Route::middleware('verified')->prefix('dashboard')->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::group(['middleware' => ['permission:master']], function () {
        Route::get('/manajemenrole', 'DashboardController@manage_role')->name('manage_role');
        Route::get('/manajemenruangan', 'RoomController@index')->name('manage_room');
    });

    Route::post('/institutionroom', 'DashboardController@get_institutionroom')->name('get_institutionroom');
    Route::post('/institution', 'DashboardController@get_institutions')->name('get_institutions');
    Route::post('/settings', 'DashboardController@get_settings')->name('get_settings');
    
    Route::post('/send_msg', 'ApprovementController@send_message')->name('send_msg');
    Route::post('/changestatus', 'ApprovementController@changestatus')->name('changestatus');

    Route::post('/messages/{admin?}', 'DashboardController@get_messages')->name('messages');
    Route::post('/messages/read_msg/{get?}', 'DashboardController@read_message')->name('messages.read');
    Route::delete('/messages/delete/{msg_id?}', 'DashboardController@delete_message')->name('messages.delete');
    
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

    Route::name('manage_room.')->prefix('manajemenruangan')->group(function() {
        Route::post('/rooms', 'RoomController@get_rooms')->name('rooms');
        Route::post('/room', 'RoomController@get_room')->name('get_room');
        Route::post('/check', 'RoomController@check')->name('check');
        Route::post('/add_room', 'RoomController@add_room')->name('add_room');
        Route::patch('/update_room', 'RoomController@update_room')->name('update_room');
        Route::delete('/delete_room', 'RoomController@delete_room')->name('delete_room');
    });

    Route::group(['middleware' => ['permission:pendidikan']], function () {
        Route::get('/studibanding/approvement', 'ApprovementController@comparative_approve')->name('studi_banding.approve');
        Route::get('/internship/approvement', 'ApprovementController@internship_approve')->name('internship.approve');
    });

    Route::group(['middleware' => ['permission:user']], function () {
        Route::get('/studibanding', 'ComparativeController@index')->name('studi_banding');
        Route::get('/internship', 'InternshipController@index')->name('internship');
    });

    Route::name('studi_banding.')->prefix('studibanding')->group(function() {

        Route::post('/all/{type}/{admin?}', 'ComparativeController@all')->name('all');
        Route::post('/get_once', 'ComparativeController@get_once')->name('get');
        Route::post('/store', 'ComparativeController@store')->name('store');
        Route::patch('/update', 'ComparativeController@update')->name('update');

        Route::put('/update_eviden', 'ComparativeController@update_eviden')->name('update_eviden');
        Route::delete('/delete', 'ComparativeController@delete')->name('delete');
    });

    Route::name('internship.')->prefix('internship')->group(function() {
        Route::post('/set_rooms', 'ApprovementController@set_rooms')->name('set_rooms');

        Route::post('/all/{type}/{admin?}', 'InternshipController@all')->name('all');
        Route::post('/get_once', 'InternshipController@get_once')->name('get');
        Route::post('/store', 'InternshipController@store')->name('store');
        Route::patch('/update', 'InternshipController@update')->name('update');

        Route::put('/add_certificate', 'ApprovementController@add_certificate')->name('add_certificate');

        Route::put('/update_eviden', 'InternshipController@update_eviden')->name('update_eviden');
        Route::delete('/delete', 'InternshipController@delete')->name('delete');
    });

    Route::post('/get_institusi', 'InstitutionController@get')->name('get_institution');
    Route::post('/verify_institusi', 'InstitutionController@check')->name('verify_institution');
    Route::post('/store_institusi', 'InstitutionController@store')->name('store_institution');
});
