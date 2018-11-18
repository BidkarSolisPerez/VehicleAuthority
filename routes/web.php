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

//Fabricante

Route::get('/Fabricante', "PagesController@viewFabricante");

Route::get('/NewFabricante', "PagesController@addNewFabricante");

Route::get('/deleteFabricante/{codigo_fabricante}',"SaveController@deleteFabricante");

Route::get('/editFabricante/{codigo_fabricante}',"SaveController@showFabricante");

Route::post('/editFabricante/{codigo_fabricante}',"SaveController@editFabricante");

Route::post('/addFabricante',"SaveController@addFabricante");

//Categoria

Route::get('/Categoria', "PagesController@viewCategoria");

Route::get('/NewCategoria', "PagesController@addNewCategoria");

Route::get('/deleteCategoria/{codigo_fabricante}',"SaveController@deleteCategoria");

Route::get('/editCategoria/{codigo_fabricante}',"SaveController@showCategoria");

Route::post('/editCategoria/{codigo_fabricante}',"SaveController@editCategoria");

Route::post('/addCategoria',"SaveController@addCategoria");

//Modelo

Route::get('/Modelo', "PagesController@viewModelo");

Route::get('/NewModelo', "PagesController@addNewModelo");

Route::get('/deleteModelo/{codigo_modelo}',"SaveController@deleteModelo");

Route::get('/editModelo/{codigo_modelo}',"SaveController@showModelo");

Route::post('/editModelo/{codigo_modelo}',"SaveController@editModelo");

Route::post('/addModelo',"SaveController@addModelo");

//Service
Route::get('/Service', "PagesController@viewService");

Route::get('/NewService', "PagesController@addNewService");

Route::get('/deleteService/{id_servicio}',"SaveController@deleteService");

Route::get('/editService/{id_servicio}',"SaveController@showService");

Route::post('/editService/{id_servicio}',"SaveController@editService");

Route::post('/addService',"SaveController@addService");

//Service Request
Route::get('/ServiceRequest', "PagesController@viewServiceRequest");

Route::get('/NewServiceRequest', "PagesController@addNewServiceRequest");

Route::get('/deleteServiceRequest/{id_servicio_consulta}',"SaveController@deleteServiceRequest");

Route::get('/editServiceRequest/{id_servicio_consulta}',"SaveController@showServiceRequest");

Route::post('/editServiceRequest/{id_servicio_consulta}',"SaveController@editServiceRequest");

Route::post('/addServiceRequest',"SaveController@addServiceRequest");