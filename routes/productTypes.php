<?php

Route::name('productTypes.')->prefix('product-types')->group(function() {
    Route::get('show', 'ProductTypesController@show')->name('show');
    Route::get('create', 'ProductTypesController@create')->name('create');
    Route::get('edit/{productType}', 'ProductTypesController@edit')->name('edit');
    Route::post('store', 'ProductTypesController@store')->name('store');
    Route::put('update/{productType}', 'ProductTypesController@update')->name('update');
    Route::delete('delete/{productType}', 'ProductTypesController@delete')->name('delete');
});
