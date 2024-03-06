<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\StoreRequest;
use App\Models\Site;
use App\Services\SiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public SiteService $siteService;

    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
    }

    public function index(): JsonResponse
    {
        $sites = $this->siteService->getAll();

        try {
            return response()->json($sites);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get sites: ' . $e]);
        }
    }

    public function show(Site $site): JsonResponse
    {
        $site = $this->siteService->getOne($site->id);

        try {
            return response()->json($site);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get site: ' . $e]);
        }
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $newSite = $this->siteService->store($data);

        try {
            return response()->json($newSite);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store post: ' . $e]);
        }
    }
}
