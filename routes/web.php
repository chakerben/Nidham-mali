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

/*Route::GET('/', ['as' => 'home', function () {
    return view('dashboard');
}]);*/

Route::GET('/', 'dashboardController@index')->name('home');
Route::GET('/allProjectsAndServices', 'allProjectsAndServices@index')->name('allProjectsAndServices');
Route::resource('projects', 'ProjectsController');
Route::resource('services', 'ServicesController');
Route::resource('expenses', 'ExpensesController');
Route::resource('payments', 'PaymentsController');
Route::GET('/allUsers', 'allUsers@index')->name('allUsers');
Route::resource('clients', 'ClientController');
Route::resource('employees', 'EmployeeController');
Route::resource('users', 'UserController');
Route::resource('transfer', 'TransferController');

Route::GET('/settings', 'settingsController@index')->name('settings');
Route::POST('/settings', 'settingsController@setSetting')->name('setSetting');
Route::POST('/settings/createrole', 'settingsController@createRole')->name('createRole');
Route::POST('/settings/createxpensetype', 'settingsController@createExpenseType')->name('createExpenseType');
Route::POST('/settings/createtransfermethode', 'settingsController@createTransferMethode')->name('createTransferMethode');
Route::POST('/settings/createbankacount', 'settingsController@createBankAcount')->name('createBankAcount');
Route::POST('/settings/createrate', 'settingsController@createRate')->name('createRate');
Route::DELETE('/settings/deleterate/{id}', 'settingsController@deleteRate')->name('deleteRate');
Route::GET('/settings/editrate/{id}', 'settingsController@editRate')->name('editRate');
Route::PUT('/settings/editrate/{id}', 'settingsController@updateRate')->name('updateRate');
Route::GET('/settings/edittransfer/{id}', 'settingsController@editTransfer')->name('editTransfer');

Route::POST('/employees/addemppaypalacount/{id}', 'EmployeeController@storePaypalAcount')->name('addEmpPaypalAcount');
Route::POST('/employees/addempbankacount/{id}', 'EmployeeController@storeBankAcount')->name('addEmpBankAcount');
Route::POST('/employees/addemptransfermethod/{id}', 'EmployeeController@storeOtherTransferMethod')->name('addEmpTransferMethod');