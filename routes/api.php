<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
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


Route::middleware('auth:api')->group(function () {
    Route::get('/protectedRoute', 'ApiController@protectedRoute');
    
    Route::post('/sendEmail', 'ApiController@sendEmail');

    Route::get('/emails', 'ApiController@getEmails');

});

Route::post('/register', 'ApiController@register');
Route::post('/login', 'ApiController@login');
Route::get('/login', function(Request $request) {
    return 'verga';
});
