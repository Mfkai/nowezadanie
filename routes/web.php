<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', 'Welcome@index');
Route::get('/', 'Welcome@index');

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile','HomeController@mojprofil');
Route::get('/home/uzytkownicy','HomeController@usersprofile');



Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/profile','Profile@profile');
    Route::get('/countries','CountryController@country');
    Route::delete('/profile/{profile}/delete', 'Profile@destroy');
    Route::patch('/akcept', 'AdminController@akceptuj');
});
