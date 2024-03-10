<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\StoreRequest;
use App\Http\Requests\Site\UpdateRequest;
use App\Http\Resources\SiteResource;
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

    public function index()
    {
        $sites = $this->siteService->getAll();

        return view('dashboard')->with(['sites' => $sites]);

//        try {
//            return response()->json($sites);
//        } catch (\Exception $e) {
//            return response()->json(['error' => 'Failed to get sites: ' . $e]);
//        }
    }

    public function show(Site $site)
    {
        $site = $this->siteService->getOne($site);

        return view('site.show')->with(['site' => $site]);
//        try {
//            return response()->json($site);
//        } catch (\Exception $e) {
//            return response()->json(['error' => 'Failed to get site: ' . $e]);
//        }
    }

    public function create()
    {
        return view('site.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $newSite = $this->siteService->store($data);

        try {
            return redirect()->to('/dashboard')->with(['newSite' => $newSite]);
//            return response()->json($newSite);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store post: ' . $e]);
        }
    }

    public function edit(Site $site)
    {
        return view('site.edit')->with(['site' => $site]);
    }

    public function update(Site $site, UpdateRequest $request)
    {
        $data = $request->validated();

        $updatedSite = $this->siteService->update($site, $data);

        return redirect()->to('/dashboard');
//        return response()->json($updatedSite);
    }

    public function destroy(Site $site)
    {
        try {
            $this->siteService->destroy($site);
            return response()->json(['message' => 'Site deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Fatal error: ' . $e]);
        }
    }
}
