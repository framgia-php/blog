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

Route::group(['as' => 'auth.', 'namespace' => 'Auth'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', 'LoginController@index')->name('login.index');
        Route::post('login', 'LoginController@handle')->name('login.handle');
    });

    Route::delete('logout', 'LoginController@logout')->name('login.logout');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth:web', 'admin:web'],
], function () {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('dashboard.index');

    Route::resource('roles', 'RolesController', ['except' => 'show']);
    Route::resource('users', 'UsersController', ['except' => 'show']);
    Route::resource('categories', 'CategoriesController', ['except' => 'show']);
    Route::resource('tags', 'TagsController', ['except' => 'show']);
    Route::resource('posts', 'PostsController', ['except' => 'show']);
});

Route::group(['as' => 'sites.', 'namespace' => 'Sites'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/{username}', 'UsersController@show')->name('users.show');
    Route::post('users/{user}/follow/{follower}', 'UsersController@follow')->name('users.follow');
    Route::get('users/{username}/{post_slug}', 'PostsController@show')->name('posts.show');
    Route::get('posts', 'PostsController@index')->name('posts.index');
    
    Route::group(['mddleware' => 'profile'], function () {
        Route::get('users/{username}/edit', 'UsersController@edit')->name('users.edit');
        Route::put('users/{username}', 'UsersController@update')->name('users.update');
    });

    Route::group(['middleware' => 'auth:web'], function () {
        Route::resource('comments', 'CommentsController');
        Route::resource('tags', 'TagsController');
    });
});
