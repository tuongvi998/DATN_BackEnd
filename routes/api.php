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
    Route::post('logout','AuthController@logout');
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
    Route::get('fields','AdminController@fields');
    Route::delete('field/{id}','AdminController@deleteField');
    Route::post('field','FieldController@create');
});
Route::group([
   'middleware' =>'api',
   'prefix' => 'group'
],function ($route){
    Route::put('update-activity-detail/{id}','ActivityController@update');
    Route::get('activity-detail/{id}','ActivityController@show');
    Route::delete('activity/{id}','ActivityController@destroy');
    Route::get('completed-activity','ActivityController@getCompletedActivity');
    Route::get('list-activities-byid/{id}', 'ActivityController@getActiveById');
    Route::post('create-activity', 'ActivityController@create');
    Route::get('activity-register-profile/{id}','RegisterProfileController@show');
    Route::put('change-accept-status/{id}','RegisterProfileController@changeAccept');
});
Route::group([
    'middleware' =>'api',
    'prefix' => 'volunteer'
],function ($route){
    Route::get('activity-joined/{id}','VolunteerController@getActivityJoined');
    Route::get('activity-register/{id}','VolunteerController@getActivityRegister');
    Route::post('register-profile',"RegisterProfileController@create");
    Route::get('export',"VolunteerController@export");
});
Route::group([
    'middleware' =>'api'
], function ($route){
    Route::get('2group-most-activity', 'GroupController@getTwoGroup');
    Route::get('10group-most-activity', 'GroupController@getTenGroup');
    Route::get('list-all-activities','ActivityController@index');
    Route::get('upcoming-activity','ActivityController@getUpcomingActivity');
    Route::get('all-upcoming-activity','ActivityController@getAllUpcomingActivity');
    Route::get('activity-need-funding','ActivityController@getCompletedActivity');
    Route::get('all-fields', 'FieldController@allField');
});
