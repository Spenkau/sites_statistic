<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckSiteOwner;
use App\Models\Page;
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

    $start = microtime(true);
    try {
        $response = Http::get('https://vpodarok.ru/');

        $data = [
            'page_id' => 2,
            'status_code' => $response->status(),
            'response_time' => number_format(microtime(true) - $start, 3, '.', '')
        ];

        $validator = Validator::make($data, [
            'page_id' => 'required|integer',
            'status_code' => 'required|integer',
            'response_time' => 'required|numeric'
        ]);

        $detail = $validator->validated();

        return $detail;
    } catch (Exception $exception) {
        return [$exception->getCode(), $exception->getMessage(), $exception->getTraceAsString()];
    }

});

Route::post('/send-mail', function (Request $request) {
    $email = $request->input('email');

    $page = Page::find(1);
    try {
        Mail::to($email)->send(new \App\Mail\PageSummary($page));

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

    Route::middleware('site.owner')->group(function () {
        Route::resource('site', SiteController::class);
        Route::resource('site.page', PageController::class)->middleware('site.id');
    });

    Route::resource('profile', ProfileController::class)->only(['update', 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::fallback(function () {
        return redirect()->route('dashboard');
    });

});

require __DIR__.'/auth.php';
