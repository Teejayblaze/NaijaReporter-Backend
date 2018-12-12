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

Route::get('/', 'OperatorController@create_operator_form');
Route::post('/', 'OperatorController@create_operator');
Route::get('/bank/zenith', 'BankSimulationController@bank_signin_form')->name('login');
Route::post('/bank/zenith', 'BankSimulationController@bank_signin');
Route::get('/bank/zenith/logout', 'BankSimulationController@logout');

Route::middleware(['bank'])->group(function () {
    Route::get('/bank/zenith/dashboard', 'BankSimulationController@bank_dashboard')->name('dashboard');
});

// Route::get('/hello', function(){
//     $acct = '1245667989';
//     $strpad = substr($acct, 0, 3) . '**' . substr($acct, -3, 3);
//     dd($strpad);
// });