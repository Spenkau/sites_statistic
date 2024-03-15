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
        $sites = $this->siteService->all();

        return view('dashboard', ['sites' => $sites]);
    }

    public function show(int $siteId): View
    {
        $site = $this->siteService->findById($siteId);

        return view('site.show', ['site' => $site]);
    }

    public function create(): View
    {
        return view('site.create');
    }

    public function store(StoreRequest $request): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        $newSite = $this->siteService->store($data);

        try {
            return redirect()->route('site.show', ['site' => $newSite]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store post: ' . $e]);
        }

    }

    public function edit(int $siteId): View
    {
        $site = $this->siteService->findById($siteId);

        return view('site.edit', ['site' => $site]);
    }

    public function update(int $siteId, UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $updatedSite = $this->siteService->update($siteId, $data);

        return redirect()->to('/dashboard')->with(['updatedSite' => $updatedSite]);
    }

    public function destroy(int $siteId)
    {
        try {
            $this->siteService->destroy($siteId);

            return response()->json(['message' => 'Сайт удалён']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Произошла ошибка при удалении сайта' . $e]);
        }
    }

    public function findByCollaborator()
    {
        $sites = $this->siteService->findByCollaborator();

        return view('site.party', ['sites' => $sites]);
    }

    public function addCollaborator(int $siteId): View
    {
        $site = $this->siteService->findById($siteId);

        return view('site.add_user', ['site' => $site]);
    }

    public function storeCollaborators(Request $request)
    {
        $siteId = $request->input('site_id');
        $userIds = $request->input('user_ids');

        try {
            $response = $this->siteService->storeCollaborators($siteId, $userIds);

            return response()->json(['message' => 'Соучастник добавлен успешно! Отклик: ' . serialize($response)]);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Произошла ошибка: ' . $exception]);
        }
    }

    public function destroyCollaborator(int $siteId, int $userId)
    {
        try {
            $response = $this->siteService->removeCollaborator($siteId, $userId);

            return response()->json(['message' => 'Соучастник удален успешно!']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Произошла ошибка: ' . $exception]);
        }
    }
}
