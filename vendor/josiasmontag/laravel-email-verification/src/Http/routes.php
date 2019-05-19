<?php

Route::group(['middleware' => ['web']], function () {

	// Verification
	Route::get('register/verify', 		  'App\Http\Controllers\Auth\RegisterController@verify')->name('verifyEmailLink');
	Route::get('register/verify/resend',  'App\Http\Controllers\Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
	Route::post('register/verify/resend', 'App\Http\Controllers\Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail')->middleware('throttle:2,1');

});
