<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



############################## Start Admin Routes ##############################
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['localeSessionRedirect','localizationRedirect','localeViewPath' ]], function()
{
    Route::get('admin/login','AdminController@login')->name('admin');
    Route::post('admin/check-admin','AdminController@checkAdmin')->name('check');
    Route::group(['middleware'=>['auth:admin']],function ()
    {
        //Routes That Related With Admin Model
        Route::get('/admins','AdminController@index')->name('admins');

        //Routes That Related With User Model
        Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
        Route::get('/users','UserController@index');
        Route::get('/user-create','UserController@create');
        Route::post('/user-store','UserController@store');
        Route::get('/user-edit/{id}','UserController@edit');
        Route::post('/user-update/{id}','UserController@update');
        Route::get('/user-delete/{id}','UserController@delete');
        Route::get('/user-editAddress/{id}','UserController@editAddress');
        Route::post('/user-updateAddress/{id}','UserController@updateAddress');

    });
});
############################## End Admin Routes ##############################
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
