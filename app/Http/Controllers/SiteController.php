<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\StoreRequest;
use App\Http\Requests\Site\UpdateRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Services\SiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public SiteService $siteService;

    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
    }

    public function index(): View
    {
        $sites = $this->siteService->getAll();

        return view('dashboard')->with(['sites' => $sites]);
    }

    public function show(Site $site): View
    {
        $site = $this->siteService->getOne($site);

        return view('site.show')->with(['site' => $site]);
    }

    public function create(): View
    {
        return view('site.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $newSite = $this->siteService->store($data);

        try {
            return redirect()->to('/dashboard')->with(['newSite' => $newSite]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store post: ' . $e]);
        }
    }

    public function edit(Site $site)
    {
        return view('site.edit')->with(['site' => $site]);
    }

    public function update(Site $site, UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $updatedSite = $this->siteService->update($site, $data);

        return redirect()->to('/dashboard')->with(['updatedSite' => $updatedSite]);
    }

    public function destroy(Site $site)
    {
        try {
            $this->siteService->destroy($site);

            return 'Сайт удалён';

        } catch (\Exception $e) {
            return 'Произошла ошибка при удалении сайта';
        }
    }
}
