<?php

Route::get('/', array('as' => 'home', 'uses' => 'LoginController@index'));
Route::post('/login', array('as' => 'login', 'uses' => 'LoginController@show'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'LoginController@destroy'));
Route::get('/dashboard', array('as'=>'dashboard','uses'=>'CatalogController@index'));

// catalog
Route::get('/catalog', array('as'=>'catalog.index','uses'=>'CatalogController@index'));
Route::get('/catalog/create', array('as'=>'catalog.create','uses'=>'CatalogController@create'));
Route::post('/catalog/store', array('as'=>'catalog.store','uses'=>'CatalogController@store'));
Route::get('/catalog/{catalog_id}/show', array('as'=>'catalog.show','uses'=>'CatalogController@show'));
Route::get('/catalog/{catalog_id}/edit', array('as'=>'catalog.edit','uses'=>'CatalogController@edit'));
Route::put('/catalog/{catalog_id}/update', array('as'=>'catalog.update','uses'=>'CatalogController@update'));
Route::delete('/catalog/{catalog_id}/destroy', array('as'=>'catalog.destroy','uses'=>'CatalogController@destroy'));

Route::get('/category', array('as'=>'category.index','uses'=>'CategoryController@index'));
Route::get('/category/create', array('as'=>'category.create','uses'=>'CategoryController@create'));
Route::post('/category/store', array('as'=>'category.store','uses'=>'CategoryController@store'));
Route::get('/category/{category_id}/show', array('as'=>'category.show','uses'=>'CategoryController@show'));
Route::get('/category/{category_id}/edit', array('as'=>'category.edit','uses'=>'CategoryController@edit'));
Route::put('/category/{category_id}/update', array('as'=>'category.update','uses'=>'CategoryController@update'));
Route::delete('/category/{category_id}/destroy', array('as'=>'category.destroy','uses'=>'CategoryController@destroy'));

Route::get('/cart', array('as'=>'cart.index','uses'=>'CartController@index'));
Route::get('/cart/create/{catalog_id}', array('as'=>'cart.create','uses'=>'CartController@create'));
Route::post('/cart/store', array('as'=>'cart.store','uses'=>'CartController@store'));
Route::get('/cart/edit/{category_id}', array('as'=>'cart.edit','uses'=>'CartController@edit'));
Route::put('/cart/{cart_id}/update', array('as'=>'cart.update','uses'=>'CartController@update'));
Route::delete('/cart/destroy/{cart_id}', array('as'=>'cart.destroy','uses'=>'CartController@destroy'));

Route::get('/transaction', array('as'=>'transaction.index','uses'=>'TransactionController@index'));
Route::get('/transaction/create/', array('as'=>'transaction.create','uses'=>'TransactionController@create'));
Route::post('/transaction/store', array('as'=>'transaction.store','uses'=>'TransactionController@store'));
Route::get('/transaction/edit/{category_id}', array('as'=>'transaction.edit','uses'=>'TransactionController@edit'));
Route::get('/transaction/show/{category_id}', array('as'=>'transaction.show','uses'=>'TransactionController@show'));
Route::put('/transaction/{cart_id}/update', array('as'=>'transaction.update','uses'=>'TransactionController@update'));
Route::delete('/transaction/destroy/{cart_id}', array('as'=>'transaction.destroy','uses'=>'TransactionController@destroy'));

Route::group(['as' => 'api::','prefix' => 'api'], function () {
    // Route named "api::dashboard"
    // URL api/login
    Route::get('/', ['as' => 'api.tester', 'uses' => 'APIController@index']);
    Route::any('login', ['as' => 'login', 'uses' => 'APIController@login']);
    Route::any('cart', ['as' => 'cart', 'uses' => 'APIController@cart']);
    Route::any('catalog', ['as' => 'catalog', 'uses' => 'APIController@catalog']);
    Route::any('transaction', ['as' => 'transaction', 'uses' => 'APIController@transaction']);

});