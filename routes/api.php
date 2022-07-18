<?php

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

// get All category
Route::get('category','Api\CategoryController@getAll');
// get All item where category id
Route::get('item/{id}','Api\ItemController@getByCategory');
// get All table
Route::get('table','Api\TableController@getAll');

Route::get('user ','Api\UserController@getAll');
Route::get('order ','Api\OrderController@index');
Route::get('order/filter/','Api\OrderController@search');

Route::resource('orders', 'Backend\Order\OrderController@')->except(['create']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
