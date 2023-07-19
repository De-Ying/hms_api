<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;

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

// Fake Admin
Route::get('/fake-admin', function() {
    return Admin::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678'),
    ]);
});

// Admin site
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::middleware(['CheckAdminSession'])->group(function () {
            Route::get('login', 'LoginController@login')->name('login');
            Route::post('login', 'LoginController@postLogin')->name('postLogin');
        });

        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    Route::middleware(['CheckAdminLogin'])->group(function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile/{id}', 'AdminController@profile')->name('profile');
        Route::put('profile/update/{id}', 'AdminController@updateProfile')->name('profile.update');
        Route::get('password/{id}', 'AdminController@password')->name('password');
        Route::put('password/update/{id}', 'AdminController@updatePassword')->name('password.update');

        // Location
        Route::get('locations', 'LocationController@locations')->name('location.index');
        Route::post('location/store', 'LocationController@saveLocation')->name('location.store');
        Route::put('location/update/{id}', 'LocationController@updateLocation')->name('location.update');
        Route::delete('location/delete/{id}', 'LocationController@deleteLocation')->name('location.delete');

        // Property Type
        Route::get('property-types', 'PropertyTypeController@propertiesType')->name('type.property.index');
        Route::post('property-type/store', 'PropertyTypeController@savePropertyType')->name('type.property.store');
        Route::put('property-type/update/{id}', 'PropertyTypeController@updatePropertyType')->name('type.property.update');
        Route::delete('property-type/delete/{id}', 'PropertyTypeController@deletePropertyType')->name('type.property.delete');

        // Amenity
        Route::get('amenities', 'AmenityController@amenities')->name('amenity.index');

        // Property
        Route::get('properties', 'PropertyController@properties')->name('property.index');

        // Room Category
        Route::get('room-categories', 'RoomCategoryController@roomCategories')->name('property.room.category.index');

        // Users Manager
        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
    });
});

// User Site
Route::name('user.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::middleware(['CheckUserSession'])->group(function () {
            Route::get('login', 'LoginController@login')->name('login');
            Route::post('login', 'LoginController@postLogin')->name('postLogin');
            Route::get('register', 'RegisterController@register')->name('register');
            Route::post('register', 'RegisterController@postRegister')->name('postRegister');
        });

        Route::post('logout', 'LoginController@logout')->name('logout');
    });
});

Route::get('/', 'SiteController@index')->name('home');
Route::get('search', 'PropertyController@propertySearch')->name('property.search');
