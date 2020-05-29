<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('index');
    })->name('homepage');
    
    Route::prefix('user')->group(function() {
        Route::name('user.')->group(function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/create', 'UserController@store')->name('store');
        
            Route::get('role', function () {
                return view('user.role.index');
            })->name('role.index');
        });
    });

    Route::prefix('billing')->group(function() {
        Route::name('billing.')->group(function() {
            Route::get('/', 'BillingController@index')->name('index');
            Route::get('/create', 'BillingController@create')->name('create');
        });
    });

    Route::prefix('item')->group(function() {
        Route::name('item.category.')->group(function(){  
            Route::get('/category', 'ItemCategoryController@index')->name('index');
            Route::get('/category/create', 'ItemCategoryController@create')->name('create');
            Route::post('/category/create', 'ItemCategoryController@store')->name('store');
            Route::get('/category/{id}/edit', 'ItemCategoryController@edit')->name('edit');
            Route::patch('/category/{id}', 'ItemCategoryController@update')->name('update');
            Route::delete('/category/{id}', 'ItemCategoryController@destroy')->name('destroy');
        });
    });

    Route::prefix('payable')->group(function() {
        Route::name('payable.')->group(function() {
            Route::get('/', 'PayableController@index')->name('index');
        });
    });

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Route::get('/home', 'HomeController@index')->name('home');
