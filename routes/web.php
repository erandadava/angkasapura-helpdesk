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
    return redirect('/login');
});


Auth::routes();


// Route::get('/home', 'HomeController@index');


Route::get('register/verify', 'Auth\RegisterController@verify')->name('verifyEmailLink');
Route::get('register/verify/resend', 'Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', 'Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail');
Route::post('/exportpdf/{table}', 'pdfController@make_pdf');
Route::post('/exportpdflaporanharian', 'pdfController@make_pdf_laporan_harian');
Route::get('/exportpdfpemeriksaan/{id}', 'pdfController@make_pdf_pemeriksaan');

Route::group(['middleware' => ['role:IT Administrator|IT Support|IT Operasional|Admin|IT Non Public','isEmailVerified']], function ()
{

    Route::resource('categories', 'categoryController');

    Route::resource('priorities', 'priorityController');

    Route::resource('ratings', 'ratingController');

    Route::resource('roles', 'rolesController',['only' => ['index', 'show']]);

    Route::resource('catInventories', 'cat_inventoryController');
    Route::resource('inventories', 'inventoryController');
    Route::get('/laporanbulanan', 'issuesController@laporan')->name('laporans.index');
    Route::get('/laporanhari', 'issuesController@laporan_hari')->name('laporans.index.hari');

});

Route::group(['middleware' => ['role:User|Admin|IT Non Public','isEmailVerified']], function ()
{
    Route::resource('users', 'usersController');
});

Route::group(['middleware' => ['role:IT Administrator|IT Support|IT Operasional|Admin|User|IT Non Public','isEmailVerified']], function ()
{
    Route::get('/beranda', 'webuserController@index');
    Route::get('/history', 'issuesController@historyticket');
    Route::resource('issues', 'issuesController');
    Route::resource('dashboard', 'dashboardController');
    Route::resource('users', 'usersController',['only' => ['edit','update']]);
});
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    \Aschmelyun\Larametrics\Larametrics::routes();
});

Route::resource('invenPembelians', 'inven_pembelianController');

Route::resource('pemeriksaanPerangkats', 'pemeriksaan_perangkatController');

Route::resource('unitKerjas', 'unit_kerjaController');

Route::get('/notif', 'notifikasiController@realtime_notification');
Route::get('/get_sernum/{id}', 'issuesController@get_sernum');
