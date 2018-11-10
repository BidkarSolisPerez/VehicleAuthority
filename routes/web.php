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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view("Pages.login");
});

Route::get('/ServiceRequestView', function() {
    return view("Pages.serviceRequestView");
});

Route::post('/loginme', "UserController@loginme");

Route::get('/AddCustomer', function() {
    return view("Pages.addcustomer");
});

Route::get('/CustomerView', function() {
    return view("Pages.customerView");
});

Route::get('/AddNewDepartment', function() {
    return view("Pages.addNewDepartment");
});

Route::get('/Department', function() {
    return view("Pages.departmentView");
});

Route::get('/AddNewService', function() {
    return view("Pages.addNewService");
});

Route::get('/Service', function() {
    return view("Pages.serviceView");
});

