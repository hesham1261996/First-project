<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth' , 'admin'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' =>[ 'auth' , 'admin'] ], function () {

    Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('home');


    Route::resource('admin/admins', AdminController::class, ['except' => ['show']]);
    Route::resource('admin/tracks', TrackController::class , ['except' => ['show']]);
	Route::resource('admin/users', UserController::class , ['except' => ['show']]);
	

	

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);

	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);

	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');

    Route::get('map', function () {return view('pages.maps');})->name('map');

    Route::get('icons', function () {return view('pages.icons');})->name('icons');

    Route::get('table-list', function () {return view('pages.tables');})->name('table');

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
});

