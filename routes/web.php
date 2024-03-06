<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Group of guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('register', function () {
        return view('register');
    })->name('register');

    Route::get('login', function () {
        return view('login');
    })->name('login');

//    Route::post('register', [AuthController::class, 'register']);
//    Route::post('login', [AuthController::class, 'login']);
});
//
//// Main page is available only for auth users

Route::middleware(['auth:api'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});

//Route::get('/', function () {
//    return view('home');
//});
//
//Route::get('register', function () {
//    return view('register');
//})->name('register');
//
//Route::get('login', function () {
//    return view('login');
//})->name('login');
//
