<?php

use App\Enums\ApiServiceEnum;
use App\Http\Controllers\ApiPointController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Resources\ApiPointResource;
use App\Models\ApiPoint;
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
    Route::controller(ApiPointController::class)
        ->name('api-point')
        ->prefix('/api-point')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show')->name('.show');
        });

    Route::middleware('site.access')
        ->controller(SiteController::class)
        ->group(function () {
            Route::resource('site', SiteController::class);
            Route::resource('site.page', PageController::class)->middleware('site.id');

            Route::get('site/party', [SiteController::class, 'findByCollaborator'])->name('site.party');
            Route::name('site.')->prefix('site/{site}')->group(function () {
                Route::get('/add-user', 'addCollaborator')->name('add-user');
                Route::post('/store-user', [SiteController::class, 'storeCollaborators'])->name('site.store-user');
            });
        });


//    Route::get('user', [UserController::class, 'index'])->name('user');

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

Route::get('test2', function () {
    $model = ApiPoint::whereId(1)->with('api_history')->first();

    return new ApiPointResource($model);

});
Route::get('test', function () {
    $url = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';

    $token = Http::get($url . 'login?email=danyat@test.ru&password=test')['token'];

    $headers = [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ];

    $serviceNames = array_column(ApiServiceEnum::cases(), 'value');
    $services = Config::get('api_v2_services');

    $responses = [];

    foreach ($serviceNames as $serviceName) {
        $service = $services[$serviceName];

        if (empty($service['method'])) {
            foreach ($service as $subService) {
                $responses[] = makeJob($url, $serviceName, $headers, $subService);
            }
        } else {
            $responses[] = makeJob($url, $serviceName, $headers, $service);
        }
    }

    return $responses;

});

function makeJob($url, $serviceName, $headers, $service)
{
    $method = $service['method'] ?? 'GET';
    $serviceUrl = $url . $serviceName;
    $params = $service['parameters'] ?? null;

    $response = null;
    if ($method == 'GET') {
        $response = Http::withHeaders($headers)
            ->get($serviceUrl, $params);
    } else if ($method == 'POST') {
        $response = Http::withHeaders($headers)
            ->post($serviceUrl, $params);
    }

    return [
        'method' => $method,
        'name' => $url,
        'url' => $serviceUrl,
        'request_data' => $params,
        'response_data' => json_decode($response->body()),
        'service' => $serviceName
    ];
}
