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

// home routes
Route::get('latest-show', 'Api\NewsController@latestShow');

// News routes
Route::get('news', 'Api\NewsController@index');
Route::get('news-detail', 'Api\NewsController@getNewsDetail');

Route::get('categories', 'Api\NewsController@getCategories');
Route::get('match-types', 'Api\MatchController@getMatchTypes');
Route::get('matches', 'Api\MatchController@getMatches');
Route::get('league-table', 'Api\MatchController@getLeagueTables');

// Teams routes
Route::get('teams', 'Api\TeamController@getTeams');
Route::get('teams/team-detail', 'Api\TeamController@getTeamDetail');
Route::get('team-types', 'Api\TeamController@teamTypes');
Route::get('work-types', 'Api\TeamController@workTypes');
Route::get('positions', 'Api\TeamController@getPositions');

// Ticket infos routes
Route::get('ticket-infos', 'Api\TicketInfoController@getTicketInfos');
Route::get('get-tickets', 'Api\TicketInfoController@getTickets');
Route::get('ticket-types', 'Api\TicketInfoController@getTicketTypes');
Route::get('buy-tickets', 'Api\TicketInfoController@buyTickets');
Route::get('buy-packages', 'Api\TicketInfoController@buyPackages');
Route::get('club-categories', 'Api\TicketInfoController@getClubCategories');

Route::get('benefits', 'Api\TicketInfoController@getBenefits');

// Route::group(['middleware' => ['jwt.verify']], function () {

// });
