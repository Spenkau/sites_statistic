<?php

use App\Enums\ApiServiceEnum;
use App\Http\Controllers\ApiPointController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
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

require __DIR__ . '/auth.php';


Route::get('test', function () {
    $url = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';

    $token = Http::get($url . 'login?email=danyat@test.ru&password=test')['token'];

    $headers = [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ];

    $serviceNames = array_column(ApiServiceEnum::cases(), 'value');
    $services = Config::get('api_services');

    $responses = [];

    foreach ($serviceNames as $serviceName) {
        try {
            $service = $services[$serviceName];

            $method = $service['method'] ?? 'GET';
            $newUrl = $url . $serviceName;
            $params = $service['parameters'] ?? [];

            $responseTemplate = "Http::withHeaders(" . json_encode($headers) . ")->send('" . $method . "','" . $newUrl . "'," . json_encode($params) . ");";

            if ($method == 'GET') {
                $response = Http::withHeaders($headers)
                    ->get($newUrl, $params);
            } else if ($method == 'POST') {
                $response = Http::withHeaders($headers)
                    ->post($newUrl, $params);
            }

            $responses[] = [
                'res' => $response->successful() ? json_decode($response->body()) : false,
                'error' => $response->failed() ? $response->body() : false,
                'template' => $responseTemplate,
                'params' => $params
            ];
        } catch (Exception $exception) {
            continue;
        }
    }

//    return Config::get('auth_api_services');
    return $responses;
});
