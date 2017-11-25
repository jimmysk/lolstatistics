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

Auth::routes();

Route::get('/champions', ['uses' => 'IndexController@index'])->name('champions');
Route::get('/contact', ['uses' => 'ContactController@contact'])->name('contact');
Route::post('/contact/send', ['as' => 'contact.send', 'uses' => 'ContactController@send']);

Route::get('/champion/{championName}', [ 'uses' => 'ChampionController@championPage']);

Route::get('/news/{newsId}', [ 'uses' => 'NewsController@show']);

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/editData/{id}', 'HomeController@editData')->name('user.editData');
Route::post('/updateuserdata/{id}', 'HomeController@updateUserData')->name('user.updateUserData');


Route::prefix('manage')->group(function() {
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);
    Route::resource('/users', 'UserController');
    Route::get('/news/new', ['as' => 'news.new', 'uses' => 'NewsController@new']);
    Route::post('/upload', ['as' => 'news.insert','uses' => 'NewsController@insert']);
    Route::resource('/news', 'NewsController');
    Route::get('news/{id}/delete', ['as' => 'news.delete', 'uses' => 'NewsController@destroy']);
    Route::get('/updateapikey', 'UpdateController@show')->name('manage.updateapikey');
    Route::post('/changekey', 'UpdateController@change')->name('manage.changekey');
    Route::get('/updatedatabase', 'UpdateController@updatedata')->name('manage.updatedatabase');
    Route::get('/updatedata', 'UpdateController@newdata')->name('manage.updatedata');
});
