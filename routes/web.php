<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin Route Namespace
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // Admin Login Route
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware' => ['admin']], function () {
        // Admin Dashboard Route
        Route::get('dashboard', 'AdminController@dashboard');
        // Admin Logout Route
        Route::get('logout', 'AdminController@logout');
        // Admin password update
        Route::match(['get', 'post'],'update-admin-password','AdminController@updateAdminPassword');
        //Check Admin password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');
        // Admin details update
        Route::match(['get', 'post'],'update-admin-details','AdminController@updateAdminDetails');

        // Vendor
        Route::match (['get', 'post'],'update-vendor-details/{slug}','AdminController@updateVendorDetails');

        // admin/admins/{$slug}
        Route::get('admins/{type?}', 'AdminController@admins');

        //
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');

        // Update Admin Status
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');
    });
});
