<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes([
    'register' => true,
]);

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin'], function () {

    /*
    *
    *  Dashboard Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::resource('users', UserController::class);
    Route::get('user/trash', 'UserController@trash')->name('users.trash');
    Route::post('user/{id}/restore', 'UserController@restore')->name('users.restore');
    Route::delete('user/force/{id}', 'UserController@deletePermanent')->name('users.force');
    Route::put('users/status/{id}', 'UserController@status')->name('users.status');
    Route::get('users/password/{id}', 'UserController@password')->name('users.password');
    Route::put('users/passwordUpdate/{id}', 'UserController@passwordUpdate')->name('users.passwordUpdate');
    Route::get('status', 'UserController@userOnlineStatus');
    Route::get('profile/{user}', 'UserController@show')->name('profile');
    Route::get('profile/{id}/edit', 'UserController@profile')->name('profile.edit');
    Route::put('profile/{id}/update', 'UserController@profileUpdate')->name('profile.update');

    /*
    *
    *  Setting Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@store')->name('settings.store');
});



/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'HomeController@index');
});