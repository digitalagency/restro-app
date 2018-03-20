<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

$api= app('Dingo\Api\Routing\Router');

$api->version('v1',function($api){
    $api->get('hello','App\Http\Controllers\HomeController@index');
    $api->get('register','App\Http\Controllers\Frontend\Auth\RegisterController@showRegistrationForm()');
    $api->post('register', 'RegisterController@register')->name('register.post');
    $api->get('something',function(){
        return ("Hell O");
    });
    //$api->get('add','app\Http\Controllers\Frontend\Auth\RegisterController@showRegistrationForm()');
   // $api->match(['get','post'],'add','app\Http\Controllers\Auth\AuthController@Something()');
    //$api->post('add','RegisterController@register');
});

Route::group(['prefix'=>'api'],function(){
   Route::get('register','RegisterController@showRegistrationForm()');
    Route::post('register', 'RegisterController@register')->name('register.post');
    Route::post('add','App\Http\Controllers\Frontend\Auth\RegisterController@register');
   // Route::match(['post','get'],'add','Frontend\Auth\RegisterController@showRegistrationForm');
});



/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});
