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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userManagement/setAdmin/{id}', 'UserManagementController@setAdmin');
Route::get('/userManagement/setActive/{id}', 'UserManagementController@setActive');
Route::get('/userManagement/{orderBy?}/{method?}', 'UserManagementController@index')->name('userManagement');
Route::post('userManagement/edit', 'UserManagementController@edit')->name('editUser');

