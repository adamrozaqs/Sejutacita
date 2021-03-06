<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware(['isLogged'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController');
    Route::resource('auth', 'AuthController');
});
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('post.login');
Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/register', 'AuthController@postRegister')->name('post.register');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
