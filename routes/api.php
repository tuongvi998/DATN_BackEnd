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
    Route::get('list-all-volunteers','VolunteerController@index');//->middleware('admin');
//    Route::get('get-all-volunteers','VolunteerController@index')->middleware('admin');
    Route::delete('delete-volunteer/{user_id}','VolunteerController@destroy');//->middleware('admin');
    Route::get('volunteer-profile/{id}','VolunteerController@show');
    Route::post('set-role-admin/{id}','VolunteerController@setRoleAdmin')->middleware('admin');
    Route::get('list-all-groups','GroupController@index');//->middleware('admin');
    Route::get('group-profile/{id}','GroupController@show');
    Route::delete('delete-group/{user_id}','GroupController@destroy');
});
Route::group([
   'middleware' =>'api',
   'prefix' => 'group'
],function ($route){
    Route::get('list-all-activities','ActivityController@index');
    Route::put('update-activity-detail/{id}','ActivityController@update');
    Route::get('activity-detail/{id}','ActivityController@show');
    Route::delete('activity/{id}','ActivityController@destroy');
    Route::get('upcoming-activity','ActivityController@getUpcomingActivity');
    Route::get('completed-activity','ActivityController@getCompletedActivity');
    Route::get('activity-need-funding','ActivityController@getCompletedActivity');
    Route::get('list-activities-byid/{id}', 'ActivityController@getActiveById');
    Route::put('create-activity', 'ActivityController@create');
});
