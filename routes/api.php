<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type, X-Auth-Token'); // allow certain headers

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
Route::get('club-categories', 'Api\TicketInfoController@getClubCategories');

Route::get('buy-packages', 'Api\PackageController@buyPackages');
Route::get('buy-packages/detail/{id}', 'Api\PackageController@detailPackage');
Route::get('benefits', 'Api\PackageController@getBenefits');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('profile', 'Api\UserController@index');
    Route::post('update-profile', 'Api\AuthController@updateProfile');
    Route::post('upload-avatar', 'Api\AuthController@uploadAvatar');

    Route::post('buy-packages/add-to-cart', 'Api\PackageController@addPackageToCart');
    Route::get('buy-packages/cart-list', 'Api\PackageController@cartList');
    Route::get('payments', 'Api\PaymentController@getPayments');
    Route::post('buy-packages/order', 'Api\PackageController@packageOrder');
    Route::get('buy-packages/order-list', 'Api\PackageController@orderList');
    Route::post('buy-packages/confirm-order', 'Api\PackageController@confirmOrder');
    Route::get('buy-packages/steps', 'Api\PackageController@getSteps');
});
