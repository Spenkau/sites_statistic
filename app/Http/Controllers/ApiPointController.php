<?php

namespace App\Http\Controllers;

use App\Models\ApiPoint;
use App\Services\ApiPointService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiPointController extends Controller
{
    public ApiPointService $apiPointService;

    public function __construct(ApiPointService $apiPointService)
    {
        $this->apiPointService = $apiPointService;
    }

    public function index()
    {
//        $apiPoints = $this->apiPointService->all();

        $services = Config::get('api_v2_services');
        $serviceKeys = array_keys($services);

        $apiPoints = ApiPoint::whereIn('service', $serviceKeys)->chunk(100)->get()->groupBy('service')->toArray();


        return view('api_point.index', ['apiPoints' => $apiPoints]);
    }

    public function show(int $id)
    {
        $apiPoint = $this->apiPointService->show($id);

        return view('api_point.show', ['apiPoint' => $apiPoint]);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
