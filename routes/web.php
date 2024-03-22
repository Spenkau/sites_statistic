<?php

use App\Enums\ApiPreprodServiceEnum;
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
    $url = 'https://processing.hellishworld.ru/api/showcase/balance/general';

    $headers = [
        'Accept' => 'application/json',
        'email' => 'admin@admin.com',
        'password' => 'admin'
    ];

    $arr  = [
        'path_params' => ['id' => 1],
        'form_params' => [
            'title' => 'MOSCOW123'
        ],
    ];

    $response = Http::withHeaders($headers)->withUrlParameters($arr['path_params'] ?? [])->send('GET', $url);
    return $response;
});
Route::get('test', function () {
    function makeJob(array $service, string $serviceName, string $url, array $headers)
    {
        $method = $service['method'] ?? 'GET';
        $serviceUrl = $url . $serviceName;
        $params = $service['parameters'] ?? null;

        $options = [];

        if ($method == "GET") {
            $options['query'] = $params;
        } else if ($method == "DELETE") {
            $serviceUrl .= '/' . $params['id'];
        } else {
            $options['form_params'] = $params;
        }


        $response = Http::withHeaders($headers)->send($method, $serviceUrl, $options);

        $res = [
            'name' => $url,
            'url' => $serviceUrl,
            'request_data' => ($params),
            'response_data' => json_decode($response->body()),
            'service' => $serviceName
        ];
return $res;
//        ApiPoint::create($res);
    }


    $url = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';

    $token = Http::get($url . 'login?email=danyat@test.ru&password=test')['token'] ?? null;

    $headers = [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ];

    $serviceNames = array_column(ApiPreprodServiceEnum::cases(), 'value');
    $services = Config::get('api_preprod_v2_services');

    $responses = [];

    foreach ($serviceNames as $serviceName) {
        $service = $services[$serviceName];

        if (empty($service['method'])) {
            foreach ($service as $subService) {
                $responses[] = makeJob($subService, $serviceName, $url, $headers);
            }
        } else {
            $responses[] = makeJob($service, $serviceName, $url, $headers);
        }
    }

    return $responses;

});

