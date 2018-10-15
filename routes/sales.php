<?php

Route::name('sales.')->prefix('sales')->group(function() {
    Route::get('show', 'SalesController@show')->name('show');
    Route::get('create', 'SalesController@create')->name('create');
    Route::get('edit/{sale}', 'SalesController@edit')->name('edit');
    Route::post('store', 'SalesController@store')->name('store');
    Route::put('update/{sale}', 'SalesController@update')->name('update');
    Route::delete('delete/{sale}', 'SalesController@delete')->name('delete');
    Route::post('addProductsAjax', 'SalesController@addProductsAjax')->name('addProductsAjax');
    Route::get('addProductsAjax', 'SalesController@addProductsAjax')->name('addProductsAjax');
    Route::get('search/{sale}', 'SalesController@search')->name('search');

    Route::get('dataTables', 'SalesController@dataTables')->name('dataTables');
    Route::post('dataTables', 'SalesController@dataTables')->name('dataTables');

    Route::get('dataTablesRemove', 'SalesController@dataTablesRemove')->name('dataTablesRemove');
    Route::post('dataTablesRemove', 'SalesController@dataTablesRemove')->name('dataTablesRemove');
    Route::delete('dataTablesRemove', 'SalesController@dataTablesRemove')->name('dataTablesRemove');
});
