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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin Posts Controller
Route::get('ADMIN/post/show/{status}/{page}', 'PostsController@show');

Route::get('ADMIN/post/edit/{postID}', 'PostsController@editingSite');

Route::post('ADMIN/post/edit', 'PostsController@editing');

Route::get('ADMIN/post/create', 'PostsController@CreatingSite');

Route::post('ADMIN/post/create', 'PostsController@Creating');