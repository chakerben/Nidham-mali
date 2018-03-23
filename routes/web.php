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

Route::get('/', ['as' => 'home', function () {
    return view('dashboard');
}]);

Route::get('/allProjectsAndServices', 'allProjectsAndServices@index')->name('allProjectsAndServices');
Route::resource('projects', 'ProjectsController');
Route::resource('services', 'ServicesController');
Route::resource('expenses', 'ExpensesController');
Route::resource('payments', 'PaymentsController');
Route::get('/allUsers', 'allUsers@index')->name('allUsers');
Route::resource('clients', 'ClientController');
Route::resource('employees', 'EmployeeController');
Route::resource('users', 'UserController');