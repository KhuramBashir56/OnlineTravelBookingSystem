<?php

use App\Models\Agency;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.web-app.welcome')->name('welcome');
Route::view('contact-us', 'pages.web-app.contact-us')->name('contact_us');
Route::view('destinations', 'pages.web-app.destinations')->name('destinations');
Route::view('destinations/{slug}', 'pages.web-app.place-details')->name('place_details');
Route::view('packages', 'pages.web-app.packages')->name('packages');
Route::view('packages/{slug}', 'pages.web-app.package-details')->name('package_details');
Route::get('agency/{id}', function ($id) {
    return view('pages.web-app.agency-details', [
        'agency' => Agency::with(['packages' => function ($query) {
            $query->where('end', '>', now()->endOfDay());
        }])->find($id)
    ]);
})->name('agency_details');

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
        Route::view('packages', 'pages.panel-app.admin.packages')->name('admin.packages');
        Route::view('bookings', 'pages.panel-app.admin.bookings')->name('admin.bookings');
        Route::view('transactions', 'pages.panel-app.admin.transactions')->name('admin.transactions');
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
        Route::view('bookings', 'pages.panel-app.agency.bookings')->name('agency.bookings');
    });
    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('can:user')->prefix('user')->group(function () {
        Route::get('booking/{package}', function ($package) {
            return view('pages.web-app.booking', [
                'package' => Package::where('slug', $package)->first()
            ]);
        })->name('user.booking');
        Route::view('tour-history', 'pages.web-app.tour-history')->name('history');
    });
});
/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';