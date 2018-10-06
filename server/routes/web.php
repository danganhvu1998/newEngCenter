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

Route::get('/ADMIN/home', 'HomeController@index')->name('home');

// ADMIN Posts Controller
Route::get('/ADMIN/post/show/{status}/{page}', 'PostsController@show');

Route::get('/ADMIN/post/edit/{postID}', 'PostsController@editingSite');

Route::post('/ADMIN/post/edit', 'PostsController@editing');

Route::get('/ADMIN/post/create', 'PostsController@CreatingSite');

Route::post('/ADMIN/post/create', 'PostsController@Creating');

Route::get('/ADMIN/post/edit_status/{postID}', 'PostsController@EditingStatus');

// ADMIN File Controller
Route::get('/ADMIN/file/store/{page}', 'FilesController@showingSite');

Route::get('/ADMIN/file/delete/{fileID}', 'FilesController@deleting');

Route::post('/ADMIN/file/store', 'FilesController@storing');

Route::post('/ADMIN/file/banner', 'FilesController@banner');

// ADMIN FreeTest Controller
Route::get('/ADMIN/freetest/{page}', 'FreeTestsController@showingSite');

Route::post('/ADMIN/freetest/score', 'FreeTestsController@scoring');

// ADMIN Client Controller
Route::get('/ADMIN/client/{page}', 'ClientsController@showingSite');

Route::get('/ADMIN/client/resolved/{registerID}', 'ClientsController@resolving');

//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\
//*********************************************** USER CONTROLLER ***********************************************\\

Route::get('/', function () {
    return redirect("/home");
});

Route::get('/home', 'UserHomePageController@showingSite');

Route::get('/test', 'UserHomePageController@showingTestSite');