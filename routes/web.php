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

// Route::get('/login', function () {
//     return redirect()->route('login');
// });

Route::get('/login-user', function () {
    return view('auth.user_login');
});

// Route::get('/user-registration', [App\Http\Controllers\Auth\RegisterController::class, 'userRegister'])->name('user.register');
Route::post('/user-registration', [App\Http\Controllers\Auth\RegisterController::class, 'userRegistered'])->name('user.registered');
Route::group(['prefix' => 'user'], function () {

    Auth::routes();

    Route::get('auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Auth::routes();
Route::group(['prefix' => 'ajax'], function () {
    Route::get('get_district_by_division', [App\Http\Controllers\Backend\AjaxController::class, 'get_district_by_division'])->name('ajax.get_district_by_division');
    Route::get('get_sub_district_by_district', [App\Http\Controllers\Backend\AjaxController::class, 'get_sub_district_by_district'])->name('ajax.get_sub_district_by_district');
    Route::get('get_sub_category_by_category', [App\Http\Controllers\Backend\AjaxController::class, 'getSubcategoryByCategory'])->name('ajax.get_sub_category_by_category');
});

Route::post('user-logedin', [App\Http\Controllers\Auth\LoginController::class, 'authenticateGeneralUser'])->middleware('IsGeneralUser')->name('authenticate.general.user');
Route::get('logout-user', [App\Http\Controllers\Auth\LoginController::class, 'GeneralUserLogout'])->name('logout.general.user');


Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.with.google');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.with.facebook');
Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
// Account Management
Route::get('/acc-demo', [App\Http\Controllers\HomeController::class, 'acc'])->name('admin.acc');
Route::get('/acc-wallet', [App\Http\Controllers\HomeController::class, 'user_wallet'])->name('admin.user_wallet');


// Bonus Update
Route::get('/bonus_update_date',[App\Http\Controllers\WalletController::class ,'getLastBonusDate'])->name('get.last.bonus.date');
Route::get('/bonus_tabel_update',[App\Http\Controllers\WalletController::class ,'BonusTableUpdate'])->name('update.bonus.table');
