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
    return view('auth.login');
});


Auth::routes();


// Route::get('/home', 'HomeController@index');


Route::get('register/verify', 'Auth\RegisterController@verify')->name('verifyEmailLink');
Route::get('register/verify/resend', 'Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', 'Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail');

Route::group(['middleware' => ['web', 'auth', 'isEmailVerified']], function ()
{
    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::resource('categories', 'categoryController');
    
    Route::resource('priorities', 'priorityController');
    
    Route::resource('ratings', 'ratingController');
    
    Route::resource('issues', 'issuesController');
    
    Route::resource('roles', 'rolesController');

    Route::resource('users', 'usersController');

    Route::resource('dashboard', 'dashboardController');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    \Aschmelyun\Larametrics\Larametrics::routes();
});


Route::get('/beranda', 'webuserController@index');



Route::resource('catInventories', 'cat_inventoryController');



Route::resource('inventories', 'inventoryController');