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
    return view('incomingshipment');
})->name('incomingshipment');

Route::get('/export_reports', function () {
    return view('export_reports');
})->name('export_reports');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/user', function () {
    return view('user');
})->name('user');

// COMMON CONTROLLER
Route::get('/generate_qrcode', 'CommonController@generate_qrcode')->name('generate_qrcode');
//------------------------------------------------------
// USER CONTROLLER
Route::post('/sign_in', 'UserController@sign_in')->name('sign_in');
Route::post('/sign_out', 'UserController@sign_out')->name('sign_out');
Route::post('/change_pass', 'UserController@change_pass')->name('change_pass');
Route::post('/change_user_stat', 'UserController@change_user_stat')->name('change_user_stat');
Route::get('/view_users', 'UserController@view_users');
Route::post('/add_user', 'UserController@add_user');
Route::get('/get_user_by_id', 'UserController@get_user_by_id');
Route::get('/get_user_list', 'UserController@get_user_list');
Route::get('/get_user_by_batch', 'UserController@get_user_by_batch');
Route::get('/get_user_by_stat', 'UserController@get_user_by_stat');
Route::post('/edit_user', 'UserController@edit_user');
Route::post('/reset_password', 'UserController@reset_password');
Route::get('/generate_user_qrcode', 'UserController@generate_user_qrcode');
Route::post('/import_user', 'UserController@import_user');

//------------------------------------------------------
// USER LEVEL CONTROLLER
Route::get('/get_user_levels', 'UserLevelController@get_user_levels');
//------------------------------------------------------

// Incoming Shipment 
Route::get('/view_incoming_shipment_details_table', 'IncomingShipmentController@view_incoming_shipment_details_table');
Route::post('/add_incoming_shipment_details', 'IncomingShipmentController@add_incoming_shipment_details');
Route::get('/get_incshipmentdetails_by_id', 'IncomingShipmentController@get_incshipmentdetails_by_id');
Route::post('/sect_head_approve_incshipmentdetails','IncomingShipmentController@sect_head_approve_incshipmentdetails');
Route::post('/gen_manager_approve_incshipmentdetails','IncomingShipmentController@gen_manager_approve_incshipmentdetails');

// Export Reports
Route::get('/export_accounting_peza_lisp', 'IncShpExportController@export_accounting_peza_lisp');
Route::get('/export_bir_report', 'IncShpExportController@export_bir_report');
Route::get('/export_other_month_billings', 'IncShpExportController@export_other_month_billings');
Route::get('/export_incshp_peza_report', 'IncShpExportController@export_incshp_peza_report');
Route::get('/export_product_line_report', 'IncShpExportController@export_product_line_report');
Route::get('/export_payment_order_and_charging_accounts_report', 'IncShpExportController@export_payment_order_and_charging_accounts_report');