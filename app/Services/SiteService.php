<?php

namespace App\Services;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SiteService
{
    public SiteRepository $siteRepository;

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function all(Request $request): JsonResource
    {
        $criteria = $request->all();
        $criteria['user_id'] = Auth::id();

        return $this->siteRepository->all($criteria);
    }

    public function paginated(Request $request): JsonResource
    {
        $criteria = $request->all();
        $criteria['user_id'] = Auth::id();

        return $this->siteRepository->paginated($criteria);
    }

    public function findById(int $id): SiteResource
    {
        return $this->siteRepository->findById($id);
    }

    public function store(array $data): SiteResource
    {
        $data['user_id'] = Auth::id();

        return $this->siteRepository->store($data);
    }

    public function update(int $siteId, array $data): JsonResource
    {
        return $this->siteRepository->update($siteId, $data);
    }

    public function destroy(int $siteId): ?bool
    {
        return $this->siteRepository->destroy($siteId);
    }

    public function findByCollaborator(): JsonResource
    {
        $criteria = ['id' => Auth::id()];

        return $this->siteRepository->findByCollaborator($criteria);
    }

    public function storeCollaborators(int $siteId, array $userIds): array
    {
        return $this->siteRepository->storeCollaborators($siteId, $userIds);
    }

    public function removeCollaborator($siteId, $userId): bool
    {
        return $this->siteRepository->removeCollaborator($siteId, $userId);
    }
}
