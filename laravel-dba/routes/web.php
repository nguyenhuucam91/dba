<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/redistest', function() {
    Redis::set('a', 'b');
});

Route::get('/prefix', function () {
    return Cache::put('a', 'b');
});

//only authenticated user can go to these routes
Route::group(['middleware' => 'auth'], function() {
    // Mysql
    Route::resource('students', StudentController::class);


    Route::get('/user-profile', [App\Http\Controllers\UserProfileController::class, 'index']);
    Route::post('/user-profile', [App\Http\Controllers\UserProfileController::class, 'store']);

    //Mongo
    Route::resource('student-mongo', StudentMongoController::class);

    Route::get('/sync-index', [App\Http\Controllers\SettingController::class, 'showSyncIndexView']);
    Route::post('/sync-index', [App\Http\Controllers\SettingController::class, 'syncIndex']);
});

