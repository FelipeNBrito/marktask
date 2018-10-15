<?php

Route::name('products.')->prefix('products')->group(function() {
    Route::get('show', 'ProductController@show')->name('show');
    Route::get('create', 'ProductController@create')->name('create');
    Route::get('edit/{product}', 'ProductController@edit')->name('edit');
    Route::post('store', 'ProductController@store')->name('store');
    Route::put('update/{product}', 'ProductController@update')->name('update');
    Route::delete('delete/{product}', 'ProductController@delete')->name('delete');
});
