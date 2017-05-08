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
});

Route::group(['as' => 'sites.', 'namespace' => 'Sites'], function () {
    Route::get('/', function () {
        return view('sites.master');
    })->name('home.index');
});
