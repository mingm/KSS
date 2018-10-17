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
	
	if(Auth::check())
		return view('home');
	else
		return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'brands' => 'BrandsController',
	'vendors' => 'VendorsController',
	'customers' => 'CustomersController',
	'categories' => 'CategoriesController',
	'products' => 'ProductsController'
]);

Route::get('/claims', 'ClaimsController@index')->name('claim');
Route::get('/claims/print/{id}', 'ClaimsController@printClaim')->name('claimprint');

Route::get('/claims/create', 'ClaimsWorkFlowController');
Route::post('/claims/create', 'ClaimsWorkFlowController');

Route::get('/billSubs', 'BillSubsController@index')->name('billSubs');
Route::get('/billSubs/generate/', 'BillSubsController@getGenerate');
Route::get('/billSubs/print/{id}', 'BillSubsController@printBillSub')->name('billsubprint');
Route::post('/billSubs/generate/', 'BillSubsController@generate');
