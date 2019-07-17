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
		return redirect()->action('HomeController@index');
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
Route::post('/billSubs/moveToDealer/{id}', 'BillSubsController@moveToDealer');

Route::get('/home/dashboard/waiting', 'DashboardController@waiting');
Route::get('/home/dashboard/waiting/{id}', 'DashboardController@getWaiting');

Route::get('/home/dashboard/dealer', 'DashboardController@dealer');
Route::get('/home/dashboard/dealer/{id}', 'DashboardController@getDealer');
Route::post('/home/dashboard/dealer/{id}', 'DashboardController@moveToCustomer');

Route::get('/home/dashboard/return', 'DashboardController@return');
Route::post('/home/dashboard/return', 'DashboardController@returned');

Route::get('/reports', 'ReportByMonthController@index')->name('reports');
Route::post('/reports/search', 'ReportByMonthController@search');
Route::get('/reportMonthYear', 'ReportByMonthController@reportMonthYear')->name('reportMonthYear');
Route::post('/reportMonthYear/search', 'ReportByMonthController@reportMonthYearSearch');






