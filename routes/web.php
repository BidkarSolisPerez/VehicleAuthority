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

// Lout out and log in

Route::post('/loginme',"UserController@loginme");

Route::post('/logoutme',"UserController@logoutme");

//General routing controller
Route::get('/', "PagesController@login");

Route::get('/ServiceRequest', "PagesController@viewServiceRequest");

Route::get('/Service', "PagesController@viewService");

//Routing related to Department
//Route::get('/editDepartment',"SaveController@editDepartment");

Route::get('/Department', "PagesController@viewDepartment");

Route::get('/NewDepartment', "PagesController@addNewDepartment");

Route::get('/deleteDepartament/{depID}',"SaveController@deleteDepartment");

Route::get('/editDepartment/{id_department}',"SaveController@showDepartment");

Route::post('/editDepartment/{id_department}',"SaveController@editDepartment");

Route::post('/addDepartment',"SaveController@addDepartment");

//Routing related to customers

Route::get('/Customer', "PagesController@viewCustomer");

Route::get('/NewCustomer', "PagesController@addNewCustomer");

Route::get('/deleteCustomer/{depID}',"SaveController@deleteCustomer");

Route::get('/editCustomer/{id_department}',"SaveController@showCustomer");

Route::post('/editCustomer/{id_department}',"SaveController@editCustomer");

Route::post('/addCustomer',"SaveController@addCustomer");


