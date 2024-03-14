<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSiteAccess;
use App\Models\Page;
use GuzzleHttp\TransferStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get('test', function () {
    $client = new GuzzleHttp\Client();

    $response = $client->request('GET', 'https://vpodarok.ru', [
        'on_stats' => function (TransferStats $stats) {
            echo $stats->getTransferTime() . '    ' . gettype($stats->getTransferTime());
        }
    ]);

    echo '\n status_code' . $response->getStatusCode();

});

Route::post('/send-mail', function (Request $request) {
    $email = $request->input('email');

    $page = Page::find(1);
    try {
        Mail::to($email)->send(new \App\Mail\PageMail());

        return 'Success';
    } catch (Exception $e) {
        return 'Error' . $e;
    }
});

Route::get('mail', function () {
    return view('emails.page');
});

Route::get('/dashboard', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('site.access')->group(function () {
        Route::get('site/party', [SiteController::class, 'findByCollaborator'])->name('site/party');
        Route::resource('site', SiteController::class);
        Route::resource('site.page', PageController::class)->middleware('site.id');

        Route::get('site/{site}/add-user', [SiteController::class, 'addCollaborator'])->name('site.add-user');
        Route::post('site/{site}/store-collaborator', [SiteController::class, 'storeCollaborators']);
    });

    Route::get('user', [UserController::class, 'index'])->name('user');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::fallback(function () {
        return redirect()->route('dashboard');
    });

});

require __DIR__.'/auth.php';
