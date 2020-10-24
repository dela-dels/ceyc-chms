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

// Route content layout

use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@showLoginForm');

// Route full layout
Route::get('full', 'LayoutController@full');

/**
 * Admin Resource Routes
 */
Route::resource('admin/cells', 'CellController');
Route::resource('admin/fellowships', 'FellowshipController');
Route::resource('admin/members', 'MemberController');
Route::resource('admin/departments', 'DepartmentController');
Route::resource('admin/services', 'ServiceController');
Route::resource('admin/roles', 'RoleController');
Route::resource('admin/users/', 'UserController');

Auth::routes();

Route::get('user/update/password', 'Auth\SetPasswordAfterRegisterController@showUpdatePasswordForm')
    ->name('password-update-form');
Route::post('user/update/password', 'Auth\SetPasswordAfterRegisterController@updatePassword')
    ->name('password.update');
Route::post('admin/users/roles', 'UserRoleController@assignRole')->name('user.roles.assign-role');
Route::get('admin/users/roles', 'UserRoleController@index')->name('user.roles.index');
Route::get('admin/users/roles/assign', 'UserRoleController@assignRoleForm')->name('user.roles.assign.form');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('givings/dashboard', 'GivingController@index')->name('givings.dashboard');
Route::get('giving/successful', 'GivingController@successful')->name('giving.successful');
Route::get('giving/error', 'GivingController@errorState')->name('giving.error');
Route::get('giving/complete', 'GivingController@completion')->name('giving.completion');
Route::post('giving/mobile-money/process', 'GivingController@mobileMoneyPayment')->name('giving.momo');
Route::post('giving/credit-card/process', 'GivingController@cardPayment')->name('giving.card');
Route::get('giving/credit-card/vbv-confirmation', 'GivingController@vbvConfirmation')->name('giving.vbv.confirmation');
Route::post('giving', 'GivingController@store')->name('giving.store');
Route::get('giving', 'GivingController@showGivingForm')->name('giving.create');
Route::get('giving/{giving}/confirm', 'GivingController@confirm')->name('giving.confirm');


/**
 * Fellowship Leader's Routes
 */
Route::get('fellowship/{fellowship}/members', 'Leaders\Fellowships\FellowshipController@members')->name('fellowship.members');
Route::post('fellowship/cells', 'Leaders\Fellowships\FellowshipController@cell')->name('fellowship.cell.store');
Route::get('fellowship/{fellowship}/cells', 'Leaders\Fellowships\FellowshipController@cells')->name('fellowship.cells');


/**
 * Cell leader's Route
 */
Route::get('cell/{cell}/members', 'Leaders\Cells\CellController@members')->name('cell.members');
Route::get('payments/dashboard', 'PaymentController@dashboard')->name('payment.dashboard');
Route::post('payment/mobile-money/process', 'PaymentController@mobileMoneyPayment')->name('payment.momo');
Route::post('payment/card-payment/process', 'PaymentController@cardPayment')->name('payment.card');
Route::get('payment/{payment}/confirm', 'PaymentController@confirm')->name('payment.confirm');
Route::post('payment', 'PaymentController@store')->name('payment.store');
Route::get('payment', 'PaymentController@showForm')->name('payment.create');

Route::get('v2-payment', function () {
    return view('pages.givings.v2.step-1');
});

Route::post('v2-payment/card', 'V2GivingController@cardGiving')->name('v2-card-giving');
Route::post('v2-payment/mobile-money', 'V2GivingController@mobileMoneyGiving')->name('v2-momo-giving');
