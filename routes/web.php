<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/champions', ['uses' => 'IndexController@index'])->name('champions');

Route::get('/champion/{championName}', [ 'uses' => 'ChampionController@championPage']);

Route::get('/news/{newsId}', [ 'uses' => 'NewsController@newsPage']);

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('manage')->group(function() {
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);
    Route::resource('/users', 'UserController');
    Route::get('/news/new', ['as' => 'news.new', 'uses' => 'NewsController@new']);
    Route::post('/upload', ['as' => 'news.update','uses' => 'NewsController@upload']);
});
