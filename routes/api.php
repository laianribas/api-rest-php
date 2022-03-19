<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function(){
    Route::prefix('/products')->group(function(){
        Route::get('/selectall', 'ProductController@selectAll')->name('products');
        Route::get('/selectone/{id}', 'ProductController@selectOne')->name('products');
        Route::post('/insert', 'ProductController@insert')->name('products');
        Route::patch('/update/{id}', 'ProductController@update')->name('products');
        Route::delete('/delete/{id}', 'ProductController@remove')->name('products');
    });
});
