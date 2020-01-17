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

Route::post('employee/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::post('employee/upload_image', 'EmployeeController@upload_image')->name('employee.upload_image');
