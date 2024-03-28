<?php

use App\Enums\ApiPreprodServiceEnum;
use App\Enums\ApiProcessingServiceEnum;
use App\Http\Controllers\ApiPointController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Resources\SiteResource;
use App\Models\Page;
use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    Route::controller(\App\Http\Controllers\Controller::class)
        ->name('check')
        ->prefix('/check')
        ->group(function () {
            Route::post('/site', 'runSiteСheckup')->name('.site');
            Route::post('/api', 'runApiCheckup')->name('.api');
        });

    Route::controller(ApiPointController::class)
        ->name('api-point')
        ->prefix('/api-point')
        ->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/{id}', 'show')->name('.show');
        });

    Route::name('site.')->prefix('site/')->group(function () {
        Route::get('/party', [SiteController::class, 'findByCollaborator'])->name('party');
        Route::get('{site}/add-user', [SiteController::class, 'addCollaborator'])->name('add-user');
        Route::post('{site}/store-user', [SiteController::class, 'storeCollaborators'])->name('store-user');
    });

    Route::resource('site', SiteController::class);
    Route::resource('site.page', PageController::class)->middleware('site.id');


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

Route::get('sts', function (Request $request, Builder $builder) {
    $service = app(\App\Services\SiteService::class);

//    $query = Site::where('user_id', 15)->get();
//return $query;
    return $service->all($request);
//    return $service->test();
//    return (new Page())->getFillable();
});

Route::get('testtest', function () {
    $url = 'https://processing.hellishworld.ru/api/showcase/balance/general';

    $headers = [
        'Accept' => 'application/json',
        'email' => 'admin@admin.com',
        'password' => 'admin'
    ];

    $arr = [
        'path_params' => ['id' => 1],
        'form_params' => [
            'title' => 'MOSCOW123'
        ],
    ];

    $response = Http::withHeaders($headers)->withUrlParameters($arr['path_params'] ?? [])->send('GET', $url);
    return $response;
});

Route::get('test2', function () {
    $url = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';

    $token = Http::get($url . 'login?email=danyat@test.ru&password=test')['token'] ?? null;

    $headers = [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ];

    $serviceNames = array_column(ApiPreprodServiceEnum::cases(), 'value');
    $services = Config::get('api_preprod_v2_services');

    $apiPointService = app(\App\Services\ApiPointService::class);

    $responses = [];

    foreach ($serviceNames as $serviceName) {
        $service = $services[$serviceName];

        if (empty($service['method'])) {
            foreach ($service as $subService) {
//                $responses[] = $subService['query_params'] ?? $subService['form_params'] ?? null;
                $responses[] = $apiPointService->update($subService, $serviceName, $headers, $url);
            }
        } else {
//            $responses[] = $service['query_params'] ?? $service['form_params'] ?? null;
            $responses[] = $apiPointService->update($service, $serviceName, $headers, $url);
        }
    }

    return $responses;
});

Route::get('test', function () {


    $url = 'https://processing.hellishworld.ru/api/';

    $headers = [
        'Accept' => 'application/json',
//        'Authorization' => 'Bearer ' . $token
        'email' => 'admin@admin.com',
        'password' => 'admin'
    ];

    $serviceNames = array_column(ApiProcessingServiceEnum::cases(), 'value');
    $services = Config::get('api_processing_services');

    $responses = [];

    $apiPointService = app(\App\Services\ApiPointService::class);

    if (count($serviceNames) == count($services)) {

        foreach ($serviceNames as $serviceName) {

            for ($i = 0; $i < count($services[$serviceName]); $i++) {
                $service = $services[$serviceName][$i];

                $responses[] = $apiPointService->update($service, $serviceName, $headers, $url);
            }
        }
    }
    return $responses;

});








