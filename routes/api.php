<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin', 'namespace' => 'API\Admin'], function () {
    Route::post('/students', 'StudentController@store');
});