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

Route::get('/', 'ExpenseController@index');

Route::resources([
    'expenses' => 'ExpenseController',
    'reimbursements' => 'ReimbursementController',
]);

Route::post('/expenses/checked', 'ExpenseController@checked');

Route::get('/receipts/{receipt}', 'ReceiptController@show')->name('receipts.show');