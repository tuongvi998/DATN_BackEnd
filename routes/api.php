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
    Route::get('user','AuthController@userProfile');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function ($route){
    Route::get('volunteers','VolunteerController@index');//->middleware('admin');
//    Route::get('get-all-volunteers','VolunteerController@index')->middleware('admin');
    Route::delete('volunteer/{user_id}','VolunteerController@destroy');//->middleware('admin');
    Route::get('volunteer/{id}','VolunteerController@show');
    Route::post('set-role-admin/{id}','VolunteerController@setRoleAdmin')->middleware('admin');
//    Route::get('groups','GroupController@index');//->middleware('admin');
    Route::get('group/{id}','GroupController@show');
    Route::delete('group/{user_id}','GroupController@destroy');
    Route::get('fields','FieldController@fields');
    Route::delete('field/{id}','FieldController@destroy');
    Route::post('field','FieldController@create');
});
Route::group([
   'middleware' =>'api',
   'prefix' => 'group'
],function ($route){
    Route::put('activity/{id}','ActivityController@update');
    Route::get('activity/{id}','ActivityController@show');
    Route::delete('activity/{id}','ActivityController@destroy');
    Route::get('completed-activity','ActivityController@getCompletedActivity');
    Route::get('activities/up-coming', 'ActivityController@getActiveByGroupId'); //hoat dong chua dien ra
    Route::post('create-activity', 'ActivityController@create');
    Route::get('register-profile/joined/{activity_id}','RegisterProfileController@registerProfileJoined');
    Route::get('register-profile/register/{activity_id}','RegisterProfileController@registerProfileRegister');
    Route::put('change-accept-status/{id}','RegisterProfileController@changeAccept');
});
Route::group([
    'middleware' =>'api',
    'prefix' => 'volunteer'
],function ($route){
    Route::get('activity-joined/{id}','VolunteerController@getActivityJoined');
    Route::get('activity-register/{id}','VolunteerController@getActivityRegister');
    Route::post('register-profile',"RegisterProfileController@create");
    Route::get('check-activity-register/{activity_id}',"VolunteerController@checkActivityRegister");
    Route::get('export',"VolunteerController@export");

});
Route::group([
    'middleware' =>'api'
], function ($route){
    Route::get('activity/2group-most-activity', 'GroupController@getTwoGroup');
    Route::get('activity/10group-most-activity', 'GroupController@getTenGroup');
    Route::get('activities','ActivityController@index');
    Route::get('activity/upcoming-activity','ActivityController@getUpcomingActivity');
    Route::get('activity/all-upcoming-activity','ActivityController@getAllUpcomingActivity');
    Route::get('activity/need-funding','ActivityController@getCompletedActivity');
    Route::get('activities/field/{name}','ActivityController@getActivityByFieldId');
    Route::get('activity/detail/{id}','ActivityController@getActivityDetail');
    Route::get('groups','GroupController@index');
    Route::get('fields', 'FieldController@allField');
});
