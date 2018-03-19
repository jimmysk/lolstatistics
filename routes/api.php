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
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/latestNews/{size}', [ 'uses' => 'NewsRestController@getLatestNews']);
Route::get('/user/summoner/{summonerName}', [ 'uses' => 'UserRestController@get_summoner_by_name']);
Route::get('/user/account/{accountId}/matches', [ 'uses' => 'UserRestController@get_matches_by_account_id']);
Route::get('/user/champion-mastery/summoner-id/{summonerId}/champion-id/{championId}', [ 'uses' => 'UserRestController@get_champion_mastery_by_summoner']);
Route::get('/champion/images', [ 'uses' => 'ChampionRestController@selectChampionImages']);
