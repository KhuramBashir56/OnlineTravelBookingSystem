<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.web-app.welcome')->name('welcome');
Route::view('contact-us', 'pages.web-app.contact-us')->name('contact_us');

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('panel')->group(function () {
    /*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
    Route::middleware('can:admin')->prefix('admin')->group(function () {
        Route::view('/dashboard', 'pages.panel-app.admin.dashboard')->name('admin.dashboard');
        Route::view('users', 'pages.panel-app.admin.users-list')->name('admin.users');
        Route::view('agencies', 'pages.panel-app.admin.agencies')->name('admin.agencies');
        Route::view('agencies/create', 'pages.panel-app.admin.create-agency')->name('admin.create_agency');
        Route::view('places', 'pages.panel-app.admin.places-list')->name('admin.places');
        Route::view('messages', 'pages.panel-app.admin.messages')->name('admin.messages');
    });
    /*
    |--------------------------------------------------------------------------
    | Agency Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('can:agency')->prefix('agency')->group(function () {
        Route::view('/dashboard', 'pages.panel-app.agency.dashboard')->name('agency.dashboard');
        Route::view('guides', 'pages.panel-app.agency.guides-list')->name('agency.guides');
        Route::view('places', 'pages.panel-app.agency.places-list')->name('agency.places');
        Route::view('packages', 'pages.panel-app.agency.packages')->name('agency.packages');
    });
});
/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
