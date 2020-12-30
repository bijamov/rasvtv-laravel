<?php

// namespace App\http\Controllers;

use Illuminate\Support\Facades\Route;
use App\http\Controllers;

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

Route::get('/dashboard', 'App\Http\Controllers\dashboardController@redirect')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin Routes Here
|--------------------------------------------------------------------------
|
*/
Route::middleware('admin')->prefix('admin')->group(function () {
    
    Route::get('/admin_dashboard', function () {
        return view('admin_dashboard');
    })->name('admin_dashboard');


    Route::get('create_client', function () {
        return view('admin.create_client');
    })->name('create_client_view');

    Route::post('create_client', 'App\Http\Controllers\clientController@create')->name('create_client');

});
/*
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| User Routes Here
|--------------------------------------------------------------------------
|
*/
Route::middleware('admin')->group(function () {
    
	Route::get('/user_dashboard', function () {
	    return view('user_dashboard');
	})->name('user_dashboard');

});
/*
|--------------------------------------------------------------------------
*/





require __DIR__.'/auth.php';
