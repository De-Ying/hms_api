<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Admin API
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/register', 'AuthController@register');
    Route::get('auth/logout', 'AuthController@logout');

    // Profile
    Route::get('profiles/{id}', 'AuthController@profile');
    Route::put('profiles/{id}', 'AuthController@profileUpdate');
    Route::get('password/{id}', 'AuthController@password');
    Route::put('password/{id}', 'AuthController@passwordUpdate');

    // Locations
    Route::get('locations', 'LocationController@index');
    Route::post('locations', 'LocationController@store');
    Route::put('locations/{id}', 'LocationController@update');
    Route::delete('locations/{id}', 'LocationController@destroy');

    // Property Types
    Route::get('property-types', 'PropertyTypeController@index');
    Route::post('property-types', 'PropertyTypeController@store');
    Route::put('property-types/{id}', 'PropertyTypeController@update');
    Route::delete('property-types/{id}', 'PropertyTypeController@destroy');
});


// User API
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
});


Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show');
Route::get('products/search/{name}', 'ProductController@search');

Route::post('products', 'ProductController@store');
Route::put('products/{id}', 'ProductController@update');
Route::delete('products/{id}', 'ProductController@destroy');
