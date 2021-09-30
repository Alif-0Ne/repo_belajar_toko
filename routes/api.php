<?php

// use App\Http\Controllers;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Det_TransactionController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/officer','OfficerController@show');
Route::get('/officer/{id}','OfficerController@detail');
Route::post('/officer','OfficerController@store');
Route::put('/officer/{id}','OfficerController@update');


Route::get('/customers','CustomersController@show');
Route::get('/customers/{id}','CustomersController@detail');
Route::post('/customers','CustomersController@store');
Route::put('/customers/{id}','CustomersController@update');

Route::get('/product','ProductController@show');
Route::get('/product/{id}','ProductController@detail');
Route::post('/product','ProductController@store');
Route::put('/product/{id}','ProductController@update');

Route::get('/transaction','TransactionController@show');
Route::get('/transaction/{id}','TransactionController@detail');
Route::post('/transaction','TransactionController@store');
Route::put('/transaction/{id}','TransactionController@update');

Route::get('/det_transaction','Det_TransactionController@show');
Route::get('/det_transaction/{id}','Det_TransactionController@detail');
Route::post('/det_transaction','Det_TransactionController@store');
Route::put('/det_transaction/{id}','Det_TransactionController@update');

