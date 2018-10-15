<?php

Route::name('users.')->prefix('users')->middleware('authorization')->group(function() {
    Route::get('show', 'UsersController@show')->name('show');
    Route::get('edit/{user}', 'UsersController@edit')->name('edit');
    Route::get('create', 'UsersController@create')->name('create');
    Route::post('store', 'UsersController@store')->name('store');
    Route::put('update/{user}', 'UsersController@update')->name('update');
    Route::delete('delete/{user}', 'UsersController@delete')->name('delete');
});
