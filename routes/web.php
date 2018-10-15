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

//Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('consult.')->prefix('consult')->group(function(){
    Route::get('show', 'ConsultController@show')->name('show');
    Route::post('consult', 'ConsultController@consult')->name('consult');
    Route::get('print-page/{saleCode}', 'ConsultController@printPage')->name('printPage');
});

Route::get('notaccess', 'HomeController@notaccess')->name('notaccess');

//Get logout route
Route::get('logout', function(){
    Auth::logout();
    return Redirect::route('login');
})->name('logout');
