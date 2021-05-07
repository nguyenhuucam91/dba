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

    //View user profile for caching
    Route::get('/user-profile', [App\Http\Controllers\UserProfileController::class, 'index']);
    Route::post('/user-profile', [App\Http\Controllers\UserProfileController::class, 'store']);

    //For mongodb in tut9
    Route::resource('student-mongo', StudentMongoController::class);

});


//For elasticsearch in tut12
Route::namespace('Elasticsearch')->group(function () {
    Route::group(['prefix' => 'elasticsearch'], function () {
        Route::get('/films', 'FilmController@index');

        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', 'SettingsController@index');
            Route::post('/', 'SettingsController@sync');
        });
    });
});
