<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// AJAX proxy
Route::get('/model/{slug}/{section}', 'AjaxController@getModelDataSection');
Route::get('/model/{slug}/{section}/{subsection}', 'AjaxController@getModelDataSectionSub');
Route::get('/fullspec/variant/{id}', 'AjaxController@getVariantSpec');
Route::get('/pricing/variant/{id}/{region}', 'AjaxController@getVariantPricing');
