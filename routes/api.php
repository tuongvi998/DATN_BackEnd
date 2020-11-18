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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($route){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::get('logout','AuthController@logout')->middleware('admin');
    Route::get('user-profile','AuthController@userProfile');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function ($route){
    Route::get('get-all-volunteers','VolunteerController@index')->middleware('admin');
//    Route::get('get-all-volunteers','VolunteerController@index')->middleware('admin');
    Route::delete('delete-volunteer/{user_id}','VolunteerController@destroy')->middleware('admin');
    Route::post('set-role-admin/{id}','VolunteerController@setRoleAdmin')->middleware('admin');
});
