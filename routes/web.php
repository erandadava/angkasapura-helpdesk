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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::resource('users', 'usersController');
Route::resource('dashboard', 'dashboardController');
Route::get('register/verify', 'Auth\RegisterController@verify')->name('verifyEmailLink');
Route::get('register/verify/resend', 'Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', 'Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail');

Route::group(['middleware' => ['web', 'auth', 'isEmailVerified']], function () 
{

    Route::get('/home', 'HomeController@index');

});

Route::resource('categories', 'categoryController');



Route::resource('priorities', 'priorityController');

Route::resource('ratings', 'ratingController');

Route::resource('issues', 'issuesController');

