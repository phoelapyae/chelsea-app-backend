<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); // allow certain headers

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::get('profile', 'Api\UserController@index');
Route::get('news', 'Api\NewsController@index');
Route::get('categories', 'Api\NewsController@getCategories');
Route::get('matches', 'Api\MatchController@getMatches');
Route::get('teams', 'Api\TeamController@getTeams');
Route::get('team-types', 'Api\TeamController@teamTypes');
Route::get('work-types', 'Api\TeamController@workTypes');

// Route::group(['middleware' => ['jwt.verify']], function () {

// });
