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

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::GET('/', 'dashboardController@index')->name('home');
Route::GET('/allProjectsAndServices', 'AllProjectsAndServices@index')->name('allProjectsAndServices');
Route::POST('/allProjectsAndServices', 'AllProjectsAndServices@index')->name('fltrProjectsAndServices');
Route::resource('projects', 'ProjectsController');
Route::resource('services', 'ServicesController');
Route::resource('expenses', 'ExpensesController');
Route::PUT('expenses', 'ExpensesController@index')->name('fltrExpenses');
Route::resource('payments', 'PaymentsController');
Route::PUT('payments', 'PaymentsController@index')->name('fltrPayments');
Route::GET('/allUsers', 'AllUsers@index')->name('allUsers');
Route::POST('/allUsers', 'AllUsers@index')->name('fltrUsers');
Route::resource('clients', 'ClientController');
Route::resource('employees', 'EmployeeController');
Route::resource('users', 'UserController');
Route::resource('transfer', 'TransferController');

Route::GET('/settings', 'SettingsController@index')->name('settings');
Route::POST('/settings', 'SettingsController@index')->name('settingsFltr');
Route::POST('/settings/set', 'SettingsController@setSetting')->name('setSetting');
Route::POST('/settings/createrole', 'SettingsController@createRole')->name('createRole');
Route::POST('/settings/createxpensetype', 'SettingsController@createExpenseType')->name('createExpenseType');
Route::POST('/settings/createtransfermethode', 'SettingsController@createTransferMethode')->name('createTransferMethode');
Route::POST('/settings/createbankacount', 'SettingsController@createBankAcount')->name('createBankAcount');
Route::POST('/settings/createrate', 'SettingsController@createRate')->name('createRate');
Route::DELETE('/settings/deleterate/{id}', 'SettingsController@deleteRate')->name('deleteRate');
Route::GET('/settings/editrate/{id}', 'SettingsController@editRate')->name('editRate');
Route::PUT('/settings/editrate/{id}', 'SettingsController@updateRate')->name('updateRate');
Route::GET('/settings/edittransfer/{id}', 'SettingsController@editTransfer')->name('editTransfer');

Route::POST('/employees/addemppaypalacount/{id}', 'EmployeeController@storePaypalAcount')->name('addEmpPaypalAcount');
Route::POST('/employees/addempbankacount/{id}', 'EmployeeController@storeBankAcount')->name('addEmpBankAcount');
Route::POST('/employees/addemptransfermethod/{id}', 'EmployeeController@storeOtherTransferMethod')->name('addEmpTransferMethod');