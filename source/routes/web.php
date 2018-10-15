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

Route::get('Show-all', 'HomeController@show_all')->name('show-all');

Route::get('detail/{id}', 'HomeController@detail')->name('detail');

Route::any('sort', 'HomeController@sort')->name('sort');

Route::any('filter', 'HomeController@filter')->name('filter');


// admin group Route
Route::middleware(['admin'])->namespace('Admin')->group(function () {
    // admin route
    Route::get('admin', 'AdminController@index')->name('admin');

    Route::post('motor-store', 'AdminController@store')->name('motor-store');
});
// admin group Route

