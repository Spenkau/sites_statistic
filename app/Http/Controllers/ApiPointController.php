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

    public function index(Request $request)
    {
        $apiPoints = $this->apiPointService->paginated($request);

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
