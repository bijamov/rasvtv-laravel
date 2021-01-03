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

Route::get('/logout', 'App\Http\Controllers\dashboardController@logout')->name('logout');



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


    Route::get('create_client', 'App\Http\Controllers\clientController@index')->name('create_client');

    Route::post('create_client', 'App\Http\Controllers\clientController@create');

    Route::get('clients', 'App\Http\Controllers\clientsListController@index')->name('clients_list');

    Route::post('clients', 'App\Http\Controllers\clientsListController@ajax')->name('clients_list');

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
Route::middleware('user')->prefix('user')->group(function () {
    
	Route::get('/user_dashboard', function () {
	    return view('user_dashboard');
	})->name('user_dashboard');

});
/*
|--------------------------------------------------------------------------
*/





require __DIR__.'/auth.php';
