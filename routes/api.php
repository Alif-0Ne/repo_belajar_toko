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

Route::post('/officer','OfficerController@store');
Route::post('/customers','CustomersController@store');
Route::post('/product','ProductController@store');
Route::post('/transaction','TransactionController@store');
Route::post('/det_transaction','Det_TransactionController@store');

