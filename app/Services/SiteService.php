<?php

namespace App\Services;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteService
{
    public SiteRepository $siteRepository;

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function all(): JsonResource
    {
        return $this->siteRepository->all();
    }

    public function findById(int $id): SiteResource
    {
        return $this->siteRepository->findById($id);
    }

    public function store(array $data): SiteResource
    {
        return $this->siteRepository->store($data);
    }

    public function update(Site $site, array $data): JsonResource
    {
        return $this->siteRepository->update($site, $data);
    }

    public function destroy(Site $site): ?bool
    {
        return $this->siteRepository->destroy($site);
    }

    public function addCollaborator($siteId, $userId): bool
    {
        return $this->siteRepository->addCollaborator($siteId, $userId);
    }

    public function removeCollaborator($siteId, $userId): bool
    {
        return $this->siteRepository->removeCollaborator($siteId, $userId);
    }
}
