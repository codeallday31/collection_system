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
    
    Route::prefix('user')->group(function () {
        Route::name('user.')->group(function () {
            Route::get('registration', function () {
                return view('user.registration');
            })->name('registration');

            Route::get('role', function () {
                return view('user.role');
            })->name('role');
        });
    });

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Route::get('/home', 'HomeController@index')->name('home');
