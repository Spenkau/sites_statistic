<?php

use App\Enums\ApiServiceEnum;
use App\Http\Controllers\ApiPointController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SiteController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('site.access')
        ->controller(SiteController::class)->
        group(function () {
            Route::get('site/party', [SiteController::class, 'findByCollaborator'])->name('site/party');
            Route::resource('site', SiteController::class);
            Route::resource('site.page', PageController::class)->middleware('site.id');

            Route::name('site.')->prefix('site/{site}')->group(function () {
                Route::get('/add-user', 'addCollaborator')->name('add-user');
            });
        });

    Route::resource('api-point', ApiPointController::class);

    Route::get('user', [UserController::class, 'index'])->name('user');

    Route::controller(ProfileController::class)
        ->name('profile.')
        ->prefix('/profile')
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
    });

    Route::fallback(function () {
        return redirect()->route('dashboard');
    });

});

require __DIR__.'/auth.php';


Route::get('test', function () {

});
